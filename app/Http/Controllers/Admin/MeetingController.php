<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMeetingRequest;
use App\Http\Requests\StoreMeetingRequest;
use App\Http\Requests\UpdateMeetingRequest;
use App\Meeting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MeetingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('meeting_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meetings = Meeting::all();

        return view('admin.meetings.index', compact('meetings'));
    }

    public function create()
    {
        abort_if(Gate::denies('meeting_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groups = Group::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.meetings.create', compact('groups'));
    }

    public function store(StoreMeetingRequest $request)
    {
        $meeting = Meeting::create($request->all());
        return redirect()->route('admin.meetings.index');
    }

    public function edit(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groups = Group::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $meeting->load('group');

        return view('admin.meetings.edit', compact('groups', 'meeting'));
    }

    public function update(UpdateMeetingRequest $request, Meeting $meeting)
    {
        $meeting->update($request->all());

        return redirect()->route('admin.meetings.index');
    }

    public function show(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meeting->load('group');

        return view('admin.meetings.show', compact('meeting'));
    }

    public function destroy(Meeting $meeting)
    {
        abort_if(Gate::denies('meeting_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meeting->delete();

        return back();
    }

    public function massDestroy(MassDestroyMeetingRequest $request)
    {
        Meeting::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}