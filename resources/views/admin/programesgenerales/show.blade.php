@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    مشاهدة البرنامج العام
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programes-generales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            Id
                        </th>
                        <td>
                            {{ $programeGeneral->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            day
                        </th>
                        <td>
                            {{ $programeGeneral->day }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            titre
                        </th>
                        <td>
                            {{ $programeGeneral->titre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        contenu
                        </th>
                        <td>
                            {{ $programeGeneral->contenu }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        remarque
                        </th>
                        <td>
                            {{ $programeGeneral->remarque }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.programes-generales.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection