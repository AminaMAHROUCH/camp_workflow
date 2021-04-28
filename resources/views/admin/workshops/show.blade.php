@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workshop.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.id') }}
                        </th>
                        <td>
                            {{ $workshop->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.title') }}
                        </th>
                        <td>
                            {{ $workshop->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.video') }}
                        </th>
                        <td>
                            {!! $workshop->video !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.content') }}
                        </th>
                        <td>
                            {{ $workshop->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.images') }}
                        </th>
                             <td>
                                @foreach($workshop->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.start_at') }}
                        </th>
                        <td>
                            {{ $workshop->start_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.end_at') }}
                        </th>
                        <td>
                            {{ $workshop->end_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.quiz') }}
                        </th>
                        <td>
                            {{ $workshop->quiz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.responsible') }}
                        </th>
                        <td>
                            {{ $workshop->responsible->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshop.fields.evaluation') }}
                        </th>
                        <td>
                            {{ $workshop->evaluation }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshops.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection