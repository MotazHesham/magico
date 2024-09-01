@extends('layouts.admin')
@section('content')
@can('order_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.orders.create') }}">
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
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Order">
            <thead>
                <tr>
                    <th width="10">

                    </th>
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
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('order_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.orders.massDestroy') }}",
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
    ajax: "{{ route('admin.orders.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'full_massage', name: 'full_massage' },
{ data: 'tokens', name: 'tokens' },
{ data: 'name', name: 'name' },
{ data: 'phone_number', name: 'phone_number' },
{ data: 'phone_number_2', name: 'phone_number_2' },
{ data: 'shipping_address', name: 'shipping_address' },
{ data: 'total_cost', name: 'total_cost' },
{ data: 'shipping_cost', name: 'shipping_cost' },
{ data: 'operating_status', name: 'operating_status' },
{ data: 'shift_operating_status', name: 'shift.operating_status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Order').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection