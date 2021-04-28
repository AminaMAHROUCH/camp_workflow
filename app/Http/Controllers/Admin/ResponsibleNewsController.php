<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyResponsibleNewsRequest;
use App\Http\Requests\StoreResponsibleNewsRequest;
use App\Http\Requests\UpdateResponsibleNewsRequest;
use App\Responsible;
use App\ResponsibleNews;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ResponsibleNewsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('responsible_news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibleNews = ResponsibleNews::all();

        return view('admin.responsibleNews.index', compact('responsibleNews'));
    }

    public function create()
    {
        abort_if(Gate::denies('responsible_news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = Responsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.responsibleNews.create', compact('responsibles'));
    }

    public function store(StoreResponsibleNewsRequest $request)
    {
        $responsibleNews = ResponsibleNews::create($request->all());

         foreach ($request->input('images', []) as $file) {
            $responsibleNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $responsibleNews->id]);
        }

        return redirect()->route('admin.responsible-news.index');
    }

    public function edit(ResponsibleNews $responsibleNews)
    {
        abort_if(Gate::denies('responsible_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = Responsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $responsibleNews->load('responsible');

        return view('admin.responsibleNews.edit', compact('responsibles', 'responsibleNews'));
    }

    public function update(UpdateResponsibleNewsRequest $request, ResponsibleNews $responsibleNews)
    {
        $responsibleNews->update($request->all());

        if (count($responsibleNews->images) > 0) {
            foreach ($responsibleNews->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $responsibleNews->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $responsibleNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }


        return redirect()->route('admin.responsible-news.index');
    }

    public function show(ResponsibleNews $responsibleNews)
    {
        abort_if(Gate::denies('responsible_news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibleNews->load('responsible');

        return view('admin.responsibleNews.show', compact('responsibleNews'));
    }

    public function destroy(ResponsibleNews $responsibleNews)
    {
        abort_if(Gate::denies('responsible_news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibleNews->delete();

        return back();
    }

    public function massDestroy(MassDestroyResponsibleNewsRequest $request)
    {
        ResponsibleNews::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('responsible_news_create') && Gate::denies('responsible_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ResponsibleNews();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}