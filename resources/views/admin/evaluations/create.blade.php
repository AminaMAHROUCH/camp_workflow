@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.evaluations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="group">group</label>
                <input class="form-control {{ $errors->has('group') ? 'is-invalid' : '' }}" type="group" name="group" id="group" value="{{ old('group') }}" required>
                @if($errors->has('group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="community">community</label>
                <input class="form-control {{ $errors->has('community') ? 'is-invalid' : '' }}" type="community" name="community" id="community" required>
                @if($errors->has('community'))
                    <div class="invalid-feedback">
                        {{ $errors->first('community') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="is_prefer">is_prefer</label>
                <input class="form-control {{ $errors->has('is_prefer') ? 'is-invalid' : '' }}" type="is_prefer" name="is_prefer" id="is_prefer" required>
                @if($errors->has('is_prefer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_prefer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="workshops">workshops</label>
                <input class="form-control {{ $errors->has('workshops') ? 'is-invalid' : '' }}" type="workshops" name="workshops" id="workshops" required>
                @if($errors->has('workshops'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workshops') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="remarque">remarque</label>
                <input class="form-control {{ $errors->has('remarque') ? 'is-invalid' : '' }}" type="remarque" name="remarque" id="remarque" required>
                @if($errors->has('remarque'))
                    <div class="invalid-feedback">
                        {{ $errors->first('remarque') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
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