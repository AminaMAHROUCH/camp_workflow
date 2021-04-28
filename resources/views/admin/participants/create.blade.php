@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.participant.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.participants.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.participant.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.participant.fields.gender') }}</label>
                @foreach(App\Participant::GENDER_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('gender') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="gender_{{ $key }}" name="gender" value="{{ $key }}" {{ old('gender', '') === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="gender_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('gender'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gender') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age">{{ trans('cruds.participant.fields.age') }}</label>
                <input class="form-control {{ $errors->has('age') ? 'is-invalid' : '' }}" type="number" name="age" id="age" value="{{ old('age', '') }}" step="1" required>
                @if($errors->has('age'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.age_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="city">{{ trans('cruds.participant.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', '') }}" required>
                @if($errors->has('city'))
                    <div class="invalid-feedback">
                        {{ $errors->first('city') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="tel_1">{{ trans('cruds.participant.fields.tel_1') }}</label>
                <input class="form-control {{ $errors->has('tel_1') ? 'is-invalid' : '' }}" type="number" name="tel_1" id="tel_1" value="{{ old('tel_1', '') }}" step="1" required>
                @if($errors->has('tel_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.tel_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tel_2">{{ trans('cruds.participant.fields.tel_2') }}</label>
                <input class="form-control {{ $errors->has('tel_2') ? 'is-invalid' : '' }}" type="number" name="tel_2" id="tel_2" value="{{ old('tel_2', '') }}" step="1">
                @if($errors->has('tel_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tel_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.tel_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.participant.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.participant.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="visisble_password">{{ trans('cruds.participant.fields.visisble_password') }}</label>
                <input class="form-control {{ $errors->has('visisble_password') ? 'is-invalid' : '' }}" type="text" name="visisble_password" id="visisble_password" value="{{ old('visisble_password', '') }}" required>
                @if($errors->has('visisble_password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('visisble_password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.visisble_password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="parent_name">{{ trans('cruds.participant.fields.parent_name') }}</label>
                <input class="form-control {{ $errors->has('parent_name') ? 'is-invalid' : '' }}" type="text" name="parent_name" id="parent_name" value="{{ old('parent_name', '') }}" required>
                @if($errors->has('parent_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('parent_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.parent_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hobbies">{{ trans('cruds.participant.fields.hobbies') }}</label>
                <textarea class="form-control {{ $errors->has('hobbies') ? 'is-invalid' : '' }}" name="hobbies" id="hobbies">{{ old('hobbies') }}</textarea>
                @if($errors->has('hobbies'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hobbies') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.participant.fields.hobbies_helper') }}</span>
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