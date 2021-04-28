@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workshopResponsible.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshop-responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.id') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.name') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.city') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.tel_1') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->tel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.tel_2') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->tel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.email') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.password') }}
                        </th>
                         <td>
                            {{ $workshopResponsible->visisble_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopResponsible.fields.bank_code') }}
                        </th>
                        <td>
                            {{ $workshopResponsible->bank_code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshop-responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection