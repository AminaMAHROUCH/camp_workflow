@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.responsible.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.responsibles.update", [$responsible->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.responsible.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $responsible->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.responsible.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $responsible->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <!--<label class="required" for="password">{{ trans('cruds.responsible.fields.password') }}</label>-->
                <input hidden="true" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password"value="{{ old('password', $responsible->password) }}">
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tel_1">{{ trans('cruds.responsible.fields.tel_1') }}</label>
                <input class="form-control {{ $errors->has('tel_1') ? 'is-invalid' : '' }}" type="number" name="tel_1" id="tel_1" value="{{ old('tel_1', $responsible->tel_1) }}" step="1" required>
                @if($errors->has('tel_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.tel_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_2">{{ trans('cruds.responsible.fields.tel_2') }}</label>
                <input class="form-control {{ $errors->has('tel_2') ? 'is-invalid' : '' }}" type="number" name="tel_2" id="tel_2" value="{{ old('tel_2', $responsible->tel_2) }}" step="1">
                @if($errors->has('tel_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.tel_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bank_code">{{ trans('cruds.responsible.fields.bank_code') }}</label>
                <input class="form-control {{ $errors->has('bank_code') ? 'is-invalid' : '' }}" type="number" name="bank_code" id="bank_code" value="{{ old('bank_code', $responsible->bank_code) }}" step="1">
                @if($errors->has('bank_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bank_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.responsible.fields.bank_code_helper') }}</span>
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