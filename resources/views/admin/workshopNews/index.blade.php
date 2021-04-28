@extends('layouts.admin')
@section('content')
@can('workshop_news_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.workshop-news.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.workshopNews.title_singular') }}
            </a>
        </div>
    </div> 
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.workshopNews.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-WorkshopNews">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.workshopNews.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.workshopNews.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.workshopNews.fields.images') }}
                        </th>
                        <th>
                            {{ trans('cruds.workshopNews.fields.published_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.workshopNews.fields.responsible') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($workshopNews as $key => $workshopNews)
                        <tr data-entry-id="{{ $workshopNews->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $workshopNews->id ?? '' }}
                            </td>
                            <td>
                                {{ $workshopNews->title ?? '' }}
                            </td>
                            <td>
                                @foreach($workshopNews->images as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                     <img src="{{ $media->getUrl() }}" width="50px" height="50px">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                {{ $workshopNews->published_at ?? '' }}
                            </td>
                            <td>
                                {{ $workshopNews->responsible->name ?? '' }}
                            </td>
                            <td>
                                @can('workshop_news_show')
                                    <a class="btn btn-xs " href="{{ route('admin.workshop-news.show', $workshopNews->id) }}">
                                        <img src="{{ asset('icon/details.png') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('workshop_news_edit')
                                    <a class="btn btn-xs " href="{{ route('admin.workshop-news.edit', $workshopNews->id) }}">
                                        <img src="{{ asset('icon/edit.jpg') }}" width="25px" height="25px">
                                    </a>
                                @endcan

                                @can('workshop_news_delete')
                                    <form action="{{ route('admin.workshop-news.destroy', $workshopNews->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('workshop_news_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.workshop-news.massDestroy') }}",
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
  let table = $('.datatable-WorkshopNews:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection