<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyWorkshopResponsibleRequest;
use App\Http\Requests\StoreWorkshopResponsibleRequest;
use App\Http\Requests\UpdateWorkshopResponsibleRequest;
use App\WorkshopResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkshopResponsibleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('workshop_responsible_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshopResponsibles = WorkshopResponsible::all();

        return view('admin.workshopResponsibles.index', compact('workshopResponsibles'));
    }

    public function create()
    {
        abort_if(Gate::denies('workshop_responsible_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workshopResponsibles.create');
    }

    public function store(StoreWorkshopResponsibleRequest $request)
    {
        $workshopResponsible = WorkshopResponsible::create($request->all());

        return redirect()->route('admin.workshop-responsibles.index');
    }

    public function edit(WorkshopResponsible $workshopResponsible)
    {
        abort_if(Gate::denies('workshop_responsible_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workshopResponsibles.edit', compact('workshopResponsible'));
    }

    public function update(UpdateWorkshopResponsibleRequest $request, WorkshopResponsible $workshopResponsible)
    {
        $workshopResponsible->update($request->all());

        return redirect()->route('admin.workshop-responsibles.index');
    }

    public function show(WorkshopResponsible $workshopResponsible)
    {
        abort_if(Gate::denies('workshop_responsible_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.workshopResponsibles.show', compact('workshopResponsible'));
    }

    public function destroy(WorkshopResponsible $workshopResponsible)
    {
        abort_if(Gate::denies('workshop_responsible_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $workshopResponsible->delete();

        return back();
    }

    public function massDestroy(MassDestroyWorkshopResponsibleRequest $request)
    {
        WorkshopResponsible::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}