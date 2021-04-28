@extends('layouts.admin')
@section('content')
@can('participant_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.participants.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.participant.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.participant.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Participant">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.gender') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.age') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.tel_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.tel_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.participant.fields.email') }}
                        </th>
                      
                        <th>
                            {{ trans('cruds.participant.fields.parent_name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($participants as $key => $participant)
                        <tr data-entry-id="{{ $participant->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $participant->id ?? '' }}
                            </td>
                            <td>
                                {{ $participant->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Participant::GENDER_RADIO[$participant->gender] ?? '' }}
                            </td>
                            <td>
                                {{ $participant->age ?? '' }}
                            </td>
                            <td>
                                {{ $participant->city ?? '' }}
                            </td>
                            <td>
                                {{ $participant->tel_1 ?? '' }}
                            </td>
                            <td>
                                {{ $participant->tel_2 ?? '' }}
                            </td>
                            <td>
                                {{ $participant->email ?? '' }}
                            </td>
                           
                            <td>
                                {{ $participant->parent_name ?? '' }}
                            </td>
                            <td>
                                @can('participant_show')
                                    <a class="btn btn-xs " href="{{ route('admin.participants.show', $participant->id) }}">
                                        <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('participant_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.participants.edit', $participant->id) }}">
                                       <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('participant_delete')
                                    <form action="{{ route('admin.participants.destroy', $participant->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                      <button type="submit" class="btn" value="{{ trans('global.delete') }}"> <img src="{{ asset('icon/close.jpg') }}" width="25px" height="25px"></button>
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('participant_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.participants.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Participant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection