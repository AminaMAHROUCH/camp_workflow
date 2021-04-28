@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.responsibleNews.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsible-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.id') }}
                        </th>
                        <td>
                            {{ $responsibleNews->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.title') }}
                        </th>
                        <td>
                            {{ $responsibleNews->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.content') }}
                        </th>
                        <td>
                            {{ $responsibleNews->content }}
                        </td>
                    </tr>
                       <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.video') }}
                        </th>
                        <td>
                            {{ $responsibleNews->video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.images') }}
                        </th>
                        <td>
                            @foreach($responsibleNews->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.published_at') }}
                        </th>
                        <td>
                            {{ $responsibleNews->published_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.responsible') }}
                        </th>
                        <td>
                            {{ $responsibleNews->responsible->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.responsible-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection