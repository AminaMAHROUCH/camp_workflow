@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.news.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.id') }}
                        </th>
                        <td>
                            {{ $news->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.title') }}
                        </th>
                        <td>
                            {{ $news->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.images') }}
                        </th>
                        <td>
                            @foreach($news->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.content') }}
                        </th>
                        <td>
                            {{$news->content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.video') }}
                        </th>
                        <td>
                            {!! $news->video !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.news.fields.published_at') }}
                        </th>
                        <td>
                            {{ $news->published_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection