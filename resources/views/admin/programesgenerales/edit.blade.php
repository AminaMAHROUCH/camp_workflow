@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <!-- {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }} -->
    </div>

    <div class="card-body">
    <form method="POST" action="{{ route("admin.programes-generales.update", [$programeGeneral->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="day">day</label>
                <input class="form-control {{ $errors->has('day') ? 'is-invalid' : '' }}" type="date" name="day" id="day" value="{{ old('day', $programeGeneral->day) }}" required>
                @if($errors->has('day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="titre">titre</label>
                <input class="form-control {{ $errors->has('titre') ? 'is-invalid' : '' }}" type="titre" name="titre" id="titre" value="{{ old('titre', $programeGeneral->titre) }}" required>
                @if($errors->has('titre'))
                    <div class="invalid-feedback">
                        {{ $errors->first('titre') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contenu">contenu</label>
                <input class="form-control {{ $errors->has('contenu') ? 'is-invalid' : '' }}" type="contenu" name="contenu" id="contenu" value="{{ old('titre', $programeGeneral->contenu) }}" required>
                @if($errors->has('contenu'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contenu') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="remarque">remarque</label>
                <input class="form-control {{ $errors->has('remarque') ? 'is-invalid' : '' }}" type="remarque" name="remarque" id="remarque" value="{{ old('titre', $programeGeneral->remarque) }}" required>
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