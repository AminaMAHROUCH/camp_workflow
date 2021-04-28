<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyParticipantRequest;
use App\Http\Requests\StoreParticipantRequest;
use App\Http\Requests\UpdateParticipantRequest;
use App\Participant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ParticipantController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('participant_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participants = Participant::all();

        return view('admin.participants.index', compact('participants'));
    }

    public function create()
    {
        abort_if(Gate::denies('participant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.participants.create');
    }

    public function store(StoreParticipantRequest $request)
    {
        $participant = Participant::create($request->all());

        return redirect()->route('admin.participants.index');
    }

    public function edit(Participant $participant)
    {
        abort_if(Gate::denies('participant_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.participants.edit', compact('participant'));
    }

    public function update(UpdateParticipantRequest $request, Participant $participant)
    {
        $participant->update($request->all());
        

        return redirect()->route('admin.participants.index');
    }

    public function show(Participant $participant)
    {
        abort_if(Gate::denies('participant_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.participants.show', compact('participant'));
    }

    public function destroy(Participant $participant)
    {
        abort_if(Gate::denies('participant_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $participant->delete();

        return back();
    }

    public function massDestroy(MassDestroyParticipantRequest $request)
    {
        Participant::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}