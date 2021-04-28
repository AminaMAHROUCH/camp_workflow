@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.groupNews.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.id') }}
                        </th>
                        <td>
                            {{ $groupNews->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.title') }}
                        </th>
                        <td>
                            {{ $groupNews->title }}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.video') }}
                        </th>
                        <td>
                            {!! $groupNews->video !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.content') }}
                        </th>
                        <td>
                            {!! $groupNews->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.images') }}
                        </th>
                          <td>
                            @foreach($groupNews->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.published_at') }}
                        </th>
                        <td>
                            {{ $groupNews->published_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.groupNews.fields.responsible') }}
                        </th>
                        <td>
                            {{ $groupNews->responsible->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.group-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection