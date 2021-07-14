@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    التقييم
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluation.fields.id') }} --> Id
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluation.fields.name') }} --> Name
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluation.fields.group') }} --> Group
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluation.fields.community') }} --> Community
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluationr.fields.is_prefer') }} --> Is prefer
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluationr.fields.workshops') }} --> Workshop
                        </th>
                        <th>
                            <!-- {{ trans('cruds.evaluationr.fields.remarque') }} --> Remarque
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($evaluations as $key => $evaluation)
                        <tr data-entry-id="{{ $evaluation->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $evaluation->id ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->name ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->group ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->community ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->is_prefer ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->workshops ?? '' }}
                            </td>
                            <td>
                                {{ $evaluation->remarque ?? '' }}
                            </td>
                            <td>
                            @can('user_show')
                                    <a class="btn btn-xs " href="{{ route('admin.evaluations.show', $evaluation->id) }}">
                                       <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('user_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.evaluations.edit', $evaluation->id) }}">
                                       <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('user_delete')
                                    <form action="{{ route('admin.evaluations.destroy', $evaluation->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  let table = $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>

@endsection