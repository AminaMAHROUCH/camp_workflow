<?php

namespace App\Http\Controllers\Admin;

use App\Agenda;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAgendaRequest;
use App\Http\Requests\StoreAgendaRequest;
use App\Http\Requests\UpdateAgendaRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AgendaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('agenda_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agendas = Agenda::all();

        return view('admin.agendas.index', compact('agendas'));
    }

    public function create()
    {
        abort_if(Gate::denies('agenda_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agendas.create');
    }

    public function store(StoreAgendaRequest $request)
    {
        $agenda = Agenda::create($request->all());
        dd($agenda);

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $agenda->id]);
        }

        return redirect()->route('admin.agendas.index');
    }

    public function edit(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agendas.edit', compact('agenda'));
    }

    public function update(UpdateAgendaRequest $request, Agenda $agenda)
    {
        $agenda->update($request->all());

        return redirect()->route('admin.agendas.index');
    }

    public function show(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.agendas.show', compact('agenda'));
    }

    public function destroy(Agenda $agenda)
    {
        abort_if(Gate::denies('agenda_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $agenda->delete();

        return back();
    }

    public function massDestroy(MassDestroyAgendaRequest $request)
    {
        Agenda::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('agenda_create') && Gate::denies('agenda_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Agenda();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}