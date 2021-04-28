@extends('layouts.admin')
@section('content')
@can('responsible_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.responsibles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.responsible.title_singular') }}
            </a>
        </div>
    </div>
@endcan 
<div class="card">
    <div class="card-header">
        {{ trans('cruds.responsible.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Responsible">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.responsible.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsible.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsible.fields.email') }}
                        </th>
                      
                        <th>
                            {{ trans('cruds.responsible.fields.tel_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsible.fields.tel_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responsibles as $key => $responsible)
                        <tr data-entry-id="{{ $responsible->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $responsible->id ?? '' }}
                            </td>
                            <td>
                                {{ $responsible->name ?? '' }}
                            </td>
                            <td>
                                {{ $responsible->email ?? '' }}
                            </td>
                           
                            <td>
                                {{ $responsible->tel_1 ?? '' }}
                            </td>
                            <td>
                                {{ $responsible->tel_2 ?? '' }}
                            </td>
                            <td>
                                @can('responsible_show')
                                    <a class="btn btn-xs" href="{{ route('admin.responsibles.show', $responsible->id) }}">
                                       <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('responsible_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.responsibles.edit', $responsible->id) }}">
                                        <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('responsible_delete')
                                    <form action="{{ route('admin.responsibles.destroy', $responsible->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('responsible_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.responsibles.massDestroy') }}",
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
  let table = $('.datatable-Responsible:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection