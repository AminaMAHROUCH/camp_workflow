@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.link.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.links.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="fosha">{{ trans('cruds.link.fields.fosha') }}</label>
                <input class="form-control {{ $errors->has('fosha') ? 'is-invalid' : '' }}" type="text" name="fosha" id="fosha" value="{{ old('fosha', '') }}">
                @if($errors->has('fosha'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fosha') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.fos_7_a_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="request">{{ trans('cruds.link.fields.request') }}</label>
                <input class="form-control {{ $errors->has('request') ? 'is-invalid' : '' }}" type="text" name="request" id="request" value="{{ old('request', '') }}">
                @if($errors->has('request'))
                    <div class="invalid-feedback">
                        {{ $errors->first('request') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.request_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="evaluation">{{ trans('cruds.link.fields.evaluation') }}</label>
                <input class="form-control {{ $errors->has('evaluation') ? 'is-invalid' : '' }}" type="text" name="evaluation" id="evaluation" value="{{ old('evaluation', '') }}">
                @if($errors->has('evaluation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('evaluation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.link.fields.evaluation_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection