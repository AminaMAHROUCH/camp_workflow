@extends('layouts.admin')
@section('content')
@can('meeting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.meetings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.meeting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.meeting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Meeting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.group') }}
                        </th>
                        <th>
                            {{ trans('cruds.meeting.fields.link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($meetings as $key => $meeting)
                        <tr data-entry-id="{{ $meeting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $meeting->id ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->group->name ?? '' }}
                            </td>
                            <td>
                                {{ $meeting->link ?? '' }}
                            </td>
                            <td>
                                @can('meeting_show')
                                    <a class="btn btn-xs" href="{{ route('admin.meetings.show', $meeting->id) }}">
                                          <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('meeting_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.meetings.edit', $meeting->id) }}">
                                         <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('meeting_delete')
                                    <form action="{{ route('admin.meetings.destroy', $meeting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('meeting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.meetings.massDestroy') }}",
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
  let table = $('.datatable-Meeting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection