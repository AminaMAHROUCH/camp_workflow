<?php

namespace App\Http\Controllers\Admin;

use App\GroupResponsible;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGroupResponsibleRequest;
use App\Http\Requests\StoreGroupResponsibleRequest;
use App\Http\Requests\UpdateGroupResponsibleRequest;
use App\Responsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GroupResponsibleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('group_responsible_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupResponsibles = GroupResponsible::all();

        return view('admin.groupResponsibles.index', compact('groupResponsibles'));
    }

    public function create()
    {
        abort_if(Gate::denies('group_responsible_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = Responsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.groupResponsibles.create', compact('responsibles'));
    }

    public function store(StoreGroupResponsibleRequest $request)
    {
        $groupResponsible = GroupResponsible::create($request->all());
        return redirect()->route('admin.group-responsibles.index');
    }

    public function edit(GroupResponsible $groupResponsible)
    {
        abort_if(Gate::denies('group_responsible_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = Responsible::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $groupResponsible->load('responsible');

        return view('admin.groupResponsibles.edit', compact('responsibles', 'groupResponsible'));
    }

    public function update(UpdateGroupResponsibleRequest $request, GroupResponsible $groupResponsible)
    {
        $groupResponsible->update($request->all());

        return redirect()->route('admin.group-responsibles.index');
    }

    public function show(GroupResponsible $groupResponsible)
    {
        abort_if(Gate::denies('group_responsible_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupResponsible->load('responsible');

        return view('admin.groupResponsibles.show', compact('groupResponsible'));
    }

    public function destroy(GroupResponsible $groupResponsible)
    {
        abort_if(Gate::denies('group_responsible_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $groupResponsible->delete();

        return back();
    }

    public function massDestroy(MassDestroyGroupResponsibleRequest $request)
    {
        GroupResponsible::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}