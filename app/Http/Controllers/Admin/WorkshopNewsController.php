<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWorkshopNewsRequest;
use App\Http\Requests\StoreWorkshopNewsRequest;
use App\Http\Requests\UpdateWorkshopNewsRequest;
use App\WorkshopNews;
use App\WorkshopResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WorkshopNewsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('workshop_news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshopNews = WorkshopNews::all();

        return view('admin.workshopNews.index', compact('workshopNews'));
    }

    public function create()
    {
        abort_if(Gate::denies('workshop_news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = WorkshopResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.workshopNews.create', compact('responsibles'));
    }

    public function store(StoreWorkshopNewsRequest $request)
    {
        $workshopNews = WorkshopNews::create($request->all());

        foreach ($request->input('images', []) as $file) {
            $workshopNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $workshopNews->id]);
        }

        return redirect()->route('admin.workshop-news.index');
    }

    public function edit(WorkshopNews $workshopNews)
    {
        abort_if(Gate::denies('workshop_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = WorkshopResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $workshopNews->load('responsible');

        return view('admin.workshopNews.edit', compact('responsibles', 'workshopNews'));
    }

    public function update(UpdateWorkshopNewsRequest $request, WorkshopNews $workshopNews)
    {
        $workshopNews->update($request->all());

         if (count($workshopNews->images) > 0) {
            foreach ($workshopNews->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $workshopNews->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $workshopNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }


        return redirect()->route('admin.workshop-news.index');
    }

    public function show(WorkshopNews $workshopNews)
    {
        abort_if(Gate::denies('workshop_news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshopNews->load('responsible');

        return view('admin.workshopNews.show', compact('workshopNews'));
    }

    public function destroy(WorkshopNews $workshopNews)
    {
        abort_if(Gate::denies('workshop_news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshopNews->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkshopNewsRequest $request)
    {
        WorkshopNews::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('workshop_news_create') && Gate::denies('workshop_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new WorkshopNews();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}