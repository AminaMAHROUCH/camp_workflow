@extends('layouts.admin')
@section('content')
@can('responsible_news_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.responsible-news.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.responsibleNews.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.responsibleNews.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ResponsibleNews">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.published_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.responsibleNews.fields.responsible') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($responsibleNews as $key => $responsibleNews)
                        <tr data-entry-id="{{ $responsibleNews->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $responsibleNews->id ?? '' }}
                            </td>
                            <td>
                                {{ $responsibleNews->title ?? '' }}
                            </td>
                              <td>
                            @foreach($responsibleNews->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                            @endforeach
                        </td>
                            <td>
                                {{ $responsibleNews->published_at ?? '' }}
                            </td>
                            <td>
                                {{ $responsibleNews->responsible->name ?? '' }}
                            </td>
                            <td>
                                @can('responsible_news_show')
                                    <a class="btn btn-xs " href="{{ route('admin.responsible-news.show', $responsibleNews->id) }}">
                                        <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('responsible_news_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.responsible-news.edit', $responsibleNews->id) }}">
                                       <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('responsible_news_delete')
                                    <form action="{{ route('admin.responsible-news.destroy', $responsibleNews->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <button type="submit" class="btn" value="{{ trans('global.delete') }}"> <img src="{{ asset('icon/close.jpg') }}" width="25px" height="25px"></button>
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
@can('responsible_news_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.responsible-news.massDestroy') }}",
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
  let table = $('.datatable-ResponsibleNews:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection