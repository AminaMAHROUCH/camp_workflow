@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.link.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.id') }}
                        </th>
                        <td>
                            {{ $link->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.fosha') }}
                        </th>
                        <td>
                            {{ $link->fosha }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.request') }}
                        </th>
                        <td>
                            {{ $link->request }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.link.fields.evaluation') }}
                        </th>
                        <td>
                            {{ $link->evaluation }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.links.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection