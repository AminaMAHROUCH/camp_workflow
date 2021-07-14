@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    مشاهدة التقييم  
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.evaluations.index') }}">
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
                            {{ $evaluation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Name
                        </th>
                        <td>
                            {{ $evaluation->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            group
                        </th>
                        <td>
                            {{ $evaluation->group }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            community
                        </th>
                        <td>
                            {{ $evaluation->community }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            is_prefer
                        </th>
                        <td>
                            {{ $evaluation->is_prefer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            workshops
                        </th>
                        <td>
                            {{ $evaluation->workshops }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            remarque
                        </th>
                        <td>
                            {{ $evaluation->remarque }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.evaluations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection