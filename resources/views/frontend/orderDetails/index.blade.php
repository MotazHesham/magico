@extends('layouts.frontend')
@section('content')
@can('order_detail_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('frontend.order-details.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.orderDetail.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.orderDetail.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-OrderDetail">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.order') }}
                    </th>
                    <th>
                        {{ trans('cruds.order.fields.phone_number') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.product') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.price') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.quantity') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.total_cost') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.color') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.size') }}
                    </th>
                    <th>
                        {{ trans('cruds.orderDetail.fields.returned') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.order-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('frontend.order-details.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'order_name', name: 'order.name' },
{ data: 'order.phone_number', name: 'order.phone_number' },
{ data: 'product_name', name: 'product.name' },
{ data: 'price', name: 'price' },
{ data: 'quantity', name: 'quantity' },
{ data: 'total_cost', name: 'total_cost' },
{ data: 'color', name: 'color' },
{ data: 'size', name: 'size' },
{ data: 'returned', name: 'returned' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-OrderDetail').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection