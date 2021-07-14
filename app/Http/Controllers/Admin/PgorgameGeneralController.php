<?php

namespace App\Http\Controllers\Admin;

use App\ProgrameGeneral;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProgrameGeneralRequest;
use App\Http\Requests\StoreProgrameGeneralRequest;
use App\Http\Requests\UpdateProgrameGeneralRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PgorgameGeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programeGenerals = ProgrameGeneral::all();

        return view('admin.programesgenerales.index', compact('programeGenerals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $programeGenerals = ProgrameGeneral::all();

        return view('admin.programesgenerales.create', compact('programeGenerals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $programeGeneral = ProgrameGeneral::create($request->all());

        return redirect()->route('admin.programes-generales.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProgrameGeneral $programeGeneral)
    {
        return view('admin.programesgenerales.show', compact('programeGeneral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProgrameGeneral $programeGeneral)
    {
        $programeGenerals = ProgrameGeneral::all();

        return view('admin.programesgenerales.edit', compact('programeGeneral'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProgrameGeneral $programeGeneral)
    {
        $programeGeneral->update($request->all());

        return redirect()->route('admin.programes-generales.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
