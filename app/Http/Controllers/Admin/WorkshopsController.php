<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWorkshopRequest;
use App\Http\Requests\StoreWorkshopRequest;
use App\Http\Requests\UpdateWorkshopRequest;
use App\Workshop;
use App\WorkshopResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WorkshopsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('workshop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshops = Workshop::all();

        return view('admin.workshops.index', compact('workshops'));
    }

    public function create()
    {
        abort_if(Gate::denies('workshop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = WorkshopResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$participants = Participant::all()->pluck('name', 'id');

        return view('admin.workshops.create', compact('responsibles'));
    }

    public function store(StoreWorkshopRequest $request)
    {
        $workshop = Workshop::create($request->all());
        //$workshop->participants()->sync($request->input('participants', []));

      foreach ($request->input('images', []) as $file) {
            $workshop->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
        }
       
        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $workshop->id]);
        }
 
        return redirect()->route('admin.workshops.index');
    }

    public function edit(Workshop $workshop)
    {
        abort_if(Gate::denies('workshop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = WorkshopResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        //$participants = Participant::all()->pluck('name', 'id');

        $workshop->load('responsible');

        return view('admin.workshops.edit', compact('responsibles', 'workshop'));
    }

    public function update(UpdateWorkshopRequest $request, Workshop $workshop)
    {
        $workshop->update($request->all());
        //$workshop->participants()->sync($request->input('participants', []));

        if (count($workshop->images) > 0) {
            foreach ($workshop->images as $media) {
                if (!in_array($media->file_name, $request->input('images', []))) {
                    $media->delete();
                }
            }
        }

        $media = $workshop->images->pluck('file_name')->toArray();

        foreach ($request->input('images', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $workshop->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('images');
            }
        }

        return redirect()->route('admin.workshops.index');
    }

    public function show(Workshop $workshop)
    {
        abort_if(Gate::denies('workshop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        //$workshop->load('responsible', 'participants');

        return view('admin.workshops.show', compact('workshop'));
    }

    public function destroy(Workshop $workshop)
    {
        abort_if(Gate::denies('workshop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshop->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkshopRequest $request)
    {
        Workshop::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('workshop_create') && Gate::denies('workshop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Workshop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}