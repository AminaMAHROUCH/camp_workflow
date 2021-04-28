@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.meeting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.meetings.store") }}" enctype="multipart/form-data">
            @csrf
              <div class="form-group">
                <label class="required" for="group_id">{{ trans('cruds.meeting.fields.group') }}</label>
                <select class="form-control select2 {{ $errors->has('group') ? 'is-invalid' : '' }}" name="group_id" id="group_id" required>
                    @foreach($groups as $id => $group)
                        <option value="{{ $id }}" {{ old('group_id') == $id ? 'selected' : '' }}>{{ $group }}</option>
                    @endforeach
                </select>
                @if($errors->has('group'))
                    <div class="invalid-feedback">
                        {{ $errors->first('group') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.group_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="link">{{ trans('cruds.meeting.fields.link') }}</label>
                <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" name="link" id="link" value="{{ old('link', '') }}" required>
                @if($errors->has('link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.meeting.fields.link_helper') }}</span>
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