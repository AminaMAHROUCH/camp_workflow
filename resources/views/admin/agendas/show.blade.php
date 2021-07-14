@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.agenda.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agendas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.id') }}
                        </th>
                        <td>
                            {{ $agenda->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.date') }}
                        </th>
                        <td>
                            {{ $agenda->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.agenda.fields.content') }}
                        </th>
                        <td>
                            {!! $agenda->content !!}
                        </td>
                    </tr>
                     <tr>
                        <th>
                           تفاصيل البرنامج
                        </th>
                        <td>
                            {!! $agenda->description !!}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.agendas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection