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
use Yajra\DataTables\Facades\DataTables;

class OrderDetailsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = OrderDetail::with(['order', 'product'])->select(sprintf('%s.*', (new OrderDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_detail_show';
                $editGate      = 'order_detail_edit';
                $deleteGate    = 'order_detail_delete';
                $crudRoutePart = 'order-details';

                return view('partials.datatablesActions_frontend', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('order_name', function ($row) {
                return $row->order ? $row->order->name : '';
            });

            $table->editColumn('order.phone_number', function ($row) {
                return $row->order ? (is_string($row->order) ? $row->order : $row->order->phone_number) : '';
            });
            $table->addColumn('product_name', function ($row) {
                return $row->product ? $row->product->name : '';
            });

            $table->editColumn('price', function ($row) {
                return $row->price ? $row->price : '';
            });
            $table->editColumn('quantity', function ($row) {
                return $row->quantity ? $row->quantity : '';
            });
            $table->editColumn('total_cost', function ($row) {
                return $row->total_cost ? $row->total_cost : '';
            });
            $table->editColumn('color', function ($row) {
                return $row->color ? $row->color : '';
            });
            $table->editColumn('size', function ($row) {
                return $row->size ? $row->size : '';
            });
            $table->editColumn('returned', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->returned ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'order', 'product', 'returned']);

            return $table->make(true);
        }

        return view('frontend.orderDetails.index');
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
        $validatedRequest = $request->all(); 
        $validatedRequest['colors'] = implode(',',$request->colors); 
        $orderDetail = OrderDetail::create($validatedRequest);

        return redirect()->route('frontend.orders.show',$orderDetail->order_id);
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
        $validatedRequest = $request->all(); 
        $validatedRequest['colors'] = implode(',',$request->colors); 
        $orderDetail->update($validatedRequest);

        return redirect()->route('frontend.orders.show',$orderDetail->order_id);
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
