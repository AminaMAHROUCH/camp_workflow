<?php

namespace App\Http\Controllers\Admin;

use App\GroupNews;
use App\GroupResponsible;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGroupNewsRequest;
use App\Http\Requests\StoreGroupNewsRequest;
use App\Http\Requests\UpdateGroupNewsRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GroupNewsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('group_news_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupNews = GroupNews::all();

        return view('admin.groupNews.index', compact('groupNews'));
    }

    public function create()
    {
        abort_if(Gate::denies('group_news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = GroupResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.groupNews.create', compact('responsibles'));
    }

    public function store(StoreGroupNewsRequest $request)
    {
        $groupNews = GroupNews::create($request->all());

      foreach ($request->input('images', []) as $file) {
            $groupNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $groupNews->id]);
        }

        return redirect()->route('admin.group-news.index');
    }

    public function edit(GroupNews $groupNews)
    {
        abort_if(Gate::denies('group_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = GroupResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $groupNews->load('responsible');

        return view('admin.groupNews.edit', compact('responsibles', 'groupNews'));
    }

    public function update(UpdateGroupNewsRequest $request, GroupNews $groupNews)
    {
        $groupNews->update($request->all());

        if (count($groupNews->images) > 0) {
            foreach ($groupNews->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $groupNews->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $groupNews->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }


        return redirect()->route('admin.group-news.index');
    }

    public function show(GroupNews $groupNews)
    {
        abort_if(Gate::denies('group_news_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupNews->load('responsible');

        return view('admin.groupNews.show', compact('groupNews'));
    }

    public function destroy(GroupNews $groupNews)
    {
        abort_if(Gate::denies('group_news_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupNews->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupNewsRequest $request)
    {
        GroupNews::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('group_news_create') && Gate::denies('group_news_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new GroupNews();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}