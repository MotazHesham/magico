<div class="card">
    <div class="card-header">
        {{ trans('cruds.order.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-shiftOrders">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.order.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.full_message') }}
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
                            {{ trans('cruds.order.fields.shipping_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.order.fields.total_cost') }}
                        </th> 
                        <th>
                            {{ trans('cruds.order.fields.operating_status') }}
                        </th> 
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr data-entry-id="{{ $order->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $order->id ?? '' }}
                            </td>
                            <td>
                                <button class="btn btn-info btn-xs"
                                    onclick="showFullMessage(`{{ $order->messageGeneration->full_message ?? '' }}`)">عرض</button>
                            </td>
                            <td>
                                {{ $order->messageGeneration->tokens ?? '' }}
                            </td>
                            <td>
                                {{ $order->name ?? '' }}
                            </td>
                            <td>
                                {{ $order->phone_number ?? '' }}
                                <br>
                                {{ $order->phone_number_2 ?? '' }}
                            </td>
                            <td>
                                {{ $order->shipping_address ?? '' }}
                            </td>
                            <td>
                                {{ $order->total_cost ?? '' }}
                            </td> 
                            <td>
                                {{ App\Models\Order::OPERATING_STATUS_SELECT[$order->operating_status] ?? '' }}
                            </td> 
                            <td>
                                @can('order_show')
                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('frontend.orders.show', $order->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="full_message" tabindex="-1" aria-labelledby="full_messageLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="full_messageLabel">عرض الرسالة كاملة</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
        </div>
    </div>
</div>

@section('scripts')
    @parent
    <script>
        function showFullMessage(fullMessage) {
            $('#full_message').modal('show');
            $('#full_message .modal-body').html(fullMessage);
        }

        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-shiftOrders:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
