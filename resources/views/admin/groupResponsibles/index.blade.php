@extends('layouts.admin')
@section('content')
@can('group_responsible_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.group-responsibles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.groupResponsible.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.groupResponsible.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-GroupResponsible">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.tel_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.tel_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.groupResponsible.fields.responsible') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupResponsibles as $key => $groupResponsible)
                        <tr data-entry-id="{{ $groupResponsible->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $groupResponsible->id ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->name ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->city ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->tel_1 ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->tel_2 ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->email ?? '' }}
                            </td>
                            <td>
                                {{ $groupResponsible->responsible->name ?? '' }}
                            </td>
                            <td>
                                @can('group_responsible_show')
                                    <a class="btn btn-xs " href="{{ route('admin.group-responsibles.show', $groupResponsible->id) }}">
                                       <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('group_responsible_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.group-responsibles.edit', $groupResponsible->id) }}">
                                        <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('group_responsible_delete')
                                    <form action="{{ route('admin.group-responsibles.destroy', $groupResponsible->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('group_responsible_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.group-responsibles.massDestroy') }}",
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
  let table = $('.datatable-GroupResponsible:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection
