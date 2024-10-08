@can('stock_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.stocks.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.stock.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.stock.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-productStocks">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.product') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.variant') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.price') }}
                        </th>
                        <th>
                            {{ trans('cruds.stock.fields.quantity') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stocks as $key => $stock)
                        <tr data-entry-id="{{ $stock->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $stock->id ?? '' }}
                            </td>
                            <td>
                                {{ $stock->product->name ?? '' }}
                            </td>
                            <td>
                                {{ $stock->variant ?? '' }}
                            </td>
                            <td>
                                {{ $stock->price ?? '' }}
                            </td>
                            <td>
                                {{ $stock->quantity ?? '' }}
                            </td>
                            <td>
                                @can('stock_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('frontend.stocks.show', $stock->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('stock_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('frontend.stocks.edit', $stock->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('stock_delete')
                                    <form action="{{ route('frontend.stocks.destroy', $stock->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('stock_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.stocks.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-productStocks:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection