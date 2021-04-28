@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.participant.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.participants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.id') }}
                        </th>
                        <td>
                            {{ $participant->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.name') }}
                        </th>
                        <td>
                            {{ $participant->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Participant::GENDER_RADIO[$participant->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.age') }}
                        </th>
                        <td>
                            {{ $participant->age }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.city') }}
                        </th>
                        <td>
                            {{ $participant->city }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.tel_1') }}
                        </th>
                        <td>
                            {{ $participant->tel_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.tel_2') }}
                        </th>
                        <td>
                            {{ $participant->tel_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.email') }}
                        </th>
                        <td>
                            {{ $participant->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.password') }}
                        </th>
                       <td>
                            {{ $participant->visisble_password }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.parent_name') }}
                        </th>
                        <td>
                            {{ $participant->parent_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.participant.fields.hobbies') }}
                        </th>
                        <td>
                            {{ $participant->hobbies }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.participants.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
