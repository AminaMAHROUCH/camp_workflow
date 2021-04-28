<?php

namespace App\Http\Controllers\Admin;

use App\Group;
use App\GroupResponsible;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupRequest;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Participant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('group_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groups = Group::all();

        return view('admin.groups.index', compact('groups'));
    }

    public function create()
    {
        abort_if(Gate::denies('group_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = GroupResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participants = Participant::all()->pluck('name', 'id');

        return view('admin.groups.create', compact('responsibles', 'participants'));
    }

    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->all());
        $group->participants()->sync($request->input('participants', []));

        return redirect()->route('admin.groups.index');
    }

    public function edit(Group $group)
    {
        abort_if(Gate::denies('group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = GroupResponsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $participants = Participant::all()->pluck('name', 'id');

        $group->load('responsible', 'participants');

        return view('admin.groups.edit', compact('responsibles', 'participants', 'group'));
    }

    public function update(UpdateGroupRequest $request, Group $group)
    {
        $group->update($request->all());
        $group->participants()->sync($request->input('participants', []));

        return redirect()->route('admin.groups.index');
    }

    public function show(Group $group)
    {
        abort_if(Gate::denies('group_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group->load('responsible', 'participants');

        return view('admin.groups.show', compact('group'));
    }

    public function destroy(Group $group)
    {
        abort_if(Gate::denies('group_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $group->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupRequest $request)
    {
        Group::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}