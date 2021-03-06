@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.group.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.groups.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.group.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="responsible_id">{{ trans('cruds.group.fields.responsible') }}</label>
                <select class="form-control select2 {{ $errors->has('responsible') ? 'is-invalid' : '' }}" name="responsible_id" id="responsible_id" required>
                    @foreach($responsibles as $id => $responsible)
                        <option value="{{ $id }}" {{ old('responsible_id') == $id ? 'selected' : '' }}>{{ $responsible }}</option>
                    @endforeach
                </select>
                @if($errors->has('responsible'))
                    <div class="invalid-feedback">
                        {{ $errors->first('responsible') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.responsible_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="participants">{{ trans('cruds.group.fields.participants') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('participants') ? 'is-invalid' : '' }}" name="participants[]" id="participants" multiple>
                    @foreach($participants as $id => $participants)
                        <option value="{{ $id }}" {{ in_array($id, old('participants', [])) ? 'selected' : '' }}>{{ $participants }}</option>
                    @endforeach
                </select>
                @if($errors->has('participants'))
                    <div class="invalid-feedback">
                        {{ $errors->first('participants') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.participants_helper') }}</span>
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