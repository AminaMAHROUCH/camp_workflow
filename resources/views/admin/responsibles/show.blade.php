@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.responsible.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.id') }}
                        </th>
                        <td>
                            {{ $responsible->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.name') }}
                        </th>
                        <td>
                            {{ $responsible->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.email') }}
                        </th>
                        <td>
                            {{ $responsible->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.password') }}
                        </th>
                        <td>
                            {{ $responsible->visisble_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.tel_1') }}
                        </th>
                        <td>
                            {{ $responsible->tel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.tel_2') }}
                        </th>
                        <td>
                            {{ $responsible->tel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsible.fields.bank_code') }}
                        </th>
                        <td>
                            {{ $responsible->bank_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection