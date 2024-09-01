@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('order_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.orders.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.order.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Order">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.full_massage') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.tokens') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.phone_number') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.phone_number_2') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.shipping_address') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.total_cost') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.shipping_cost') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.operating_status') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.order.fields.shift') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $key => $order)
                                    <tr data-entry-id="{{ $order->id }}">
                                        <td>
                                            {{ $order->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->full_massage ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->tokens ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->phone_number ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->phone_number_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->shipping_address ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->total_cost ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->shipping_cost ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Order::OPERATING_STATUS_SELECT[$order->operating_status] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $order->shift->operating_status ?? '' }}
                                        </td>
                                        <td>
                                            @can('order_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.orders.show', $order->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('order_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.orders.edit', $order->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('order_delete')
                                                <form action="{{ route('frontend.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.orders.massDestroy') }}",
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
  let table = $('.datatable-Order:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection