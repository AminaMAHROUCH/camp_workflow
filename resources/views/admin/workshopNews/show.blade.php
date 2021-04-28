@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.workshopNews.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshop-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.id') }}
                        </th>
                        <td>
                            {{ $workshopNews->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.title') }}
                        </th>
                        <td>
                            {{ $workshopNews->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.content') }}
                        </th>
                        <td>
                            {!! $workshopNews->content !!}
                        </td>
                    </tr>
                     <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.video') }}
                        </th>
                        <td>
                            {{ $workshopNews->video }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.images') }}
                        </th>
                        <td>
                                @foreach($workshopNews->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.published_at') }}
                        </th>
                        <td>
                            {{ $workshopNews->published_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.workshopNews.fields.responsible') }}
                        </th>
                        <td>
                            {{ $workshopNews->responsible->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.workshop-news.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection