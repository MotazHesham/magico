<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderDetailRequest;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('order_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetails = OrderDetail::with(['order', 'product'])->get();

        return view('frontend.orderDetails.index', compact('orderDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('order_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orderDetails.create', compact('orders', 'products'));
    }

    public function store(StoreOrderDetailRequest $request)
    {
        $orderDetail = OrderDetail::create($request->all());

        return redirect()->route('frontend.order-details.index');
    }

    public function edit(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orders = Order::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $products = Product::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $orderDetail->load('order', 'product');

        return view('frontend.orderDetails.edit', compact('orderDetail', 'orders', 'products'));
    }

    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        $orderDetail->update($request->all());

        return redirect()->route('frontend.order-details.index');
    }

    public function show(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetail->load('order', 'product');

        return view('frontend.orderDetails.show', compact('orderDetail'));
    }

    public function destroy(OrderDetail $orderDetail)
    {
        abort_if(Gate::denies('order_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $orderDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrderDetailRequest $request)
    {
        $orderDetails = OrderDetail::find(request('ids'));

        foreach ($orderDetails as $orderDetail) {
            $orderDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
