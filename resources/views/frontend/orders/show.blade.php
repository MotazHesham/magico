@extends('layouts.frontend')
@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.order.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $order->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.full_message') }}
                                    </th>
                                    <td>
                                        {{ $order->messageGeneration->full_message ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.tokens') }}
                                    </th>
                                    <td>
                                        {{ $order->messageGeneration->tokens ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $order->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.phone_number') }}
                                    </th>
                                    <td>
                                        {{ $order->phone_number }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.phone_number_2') }}
                                    </th>
                                    <td>
                                        {{ $order->phone_number_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.shipping_address') }}
                                    </th>
                                    <td>
                                        {{ $order->shipping_address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.total_cost') }}
                                    </th>
                                    <td>
                                        {{ $order->total_cost }}
                                    </td>
                                </tr> 
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.operating_status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Order::OPERATING_STATUS_SELECT[$order->operating_status] ?? '' }}
                                    </td>
                                </tr>
                                @if($order->cancel_reason)
                                    <tr>
                                        <th>
                                            {{ trans('cruds.order.fields.cancel_reason') }}
                                        </th>
                                        <td>
                                            {{ $order->cancel_reason }}
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.shift') }}
                                    </th>
                                    <td>
                                        {{ $order->shift->id ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $order->country->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $order->city->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.order.fields.district') }}
                                    </th>
                                    <td>
                                        {{ $order->district }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.orders.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#order_order_details" role="tab" data-toggle="tab">
                            {{ trans('cruds.orderDetail.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="order_order_details">
                        @includeIf('frontend.orders.relationships.orderOrderDetails', [
                            'orderDetails' => $order->orderOrderDetails,
                        ])
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
