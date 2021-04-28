<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyResponsibleRequest;
use App\Http\Requests\StoreResponsibleRequest;
use App\Http\Requests\UpdateResponsibleRequest;
use App\Responsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ResponsibleController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('responsible_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsibles = Responsible::all();

        return view('admin.responsibles.index', compact('responsibles'));
    }

    public function create()
    {
        abort_if(Gate::denies('responsible_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsibles.create');
    }

    public function store(StoreResponsibleRequest $request)
    {
        $responsible = Responsible::create($request->all());

        return redirect()->route('admin.responsibles.index');
    }

    public function edit(Responsible $responsible)
    {
        abort_if(Gate::denies('responsible_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsibles.edit', compact('responsible'));
    }

    public function update(UpdateResponsibleRequest $request, Responsible $responsible)
    {
        $responsible->update($request->all());

        return redirect()->route('admin.responsibles.index');
    }

    public function show(Responsible $responsible)
    {
        abort_if(Gate::denies('responsible_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.responsibles.show', compact('responsible'));
    }

    public function destroy(Responsible $responsible)
    {
        abort_if(Gate::denies('responsible_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $responsible->delete();

        return back();
    }

    public function massDestroy(MassDestroyResponsibleRequest $request)
    {
        Responsible::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}