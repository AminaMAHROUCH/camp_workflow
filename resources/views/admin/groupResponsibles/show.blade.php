@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.groupResponsible.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.id') }}
                        </th>
                        <td>
                            {{ $groupResponsible->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.name') }}
                        </th>
                        <td>
                            {{ $groupResponsible->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.city') }}
                        </th>
                        <td>
                            {{ $groupResponsible->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.tel_1') }}
                        </th>
                        <td>
                            {{ $groupResponsible->tel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.tel_2') }}
                        </th>
                        <td>
                            {{ $groupResponsible->tel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.email') }}
                        </th>
                        <td>
                            {{ $groupResponsible->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.password') }}
                        </th>
                       <td>
                            {{ $groupResponsible->visisble_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.bank_code') }}
                        </th>
                        <td>
                            {{ $groupResponsible->bank_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.responsible') }}
                        </th>
                        <td>
                            {{ $groupResponsible->responsible->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-responsibles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection