<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOrderRequest;
use App\Http\Requests\MassUpdateStagesOrderRequest;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Order;
use App\Models\Shift;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrdersController extends Controller
{
    public function updateStage(Request $request){
        if(!in_array($request->stage,array_keys(Order::OPERATING_STATUS_SELECT))){
            alert('Couldnt complete','something went wrong','warning');
            return redirect()->back();
        }
        $order = Order::findOrfail($request->id);
        $order->update([
            'operating_status' => $request->stage
        ]); 
        alert('تم بنجاح','','success');
        return  redirect()->back();
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Order::with(['shift', 'country', 'city'])->select(sprintf('%s.*', (new Order)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'order_show';
                $editGate      = !in_array($row->operating_status,['delivered','canceled','returned_part','returned_full']) ? 'order_edit' : false;
                $deleteGate    = !in_array($row->operating_status,['delivered','canceled','returned_part','returned_full']) ? 'order_delete' : false;
                $crudRoutePart = 'orders';

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
            $table->editColumn('full_message', function ($row) {
                return $row->full_message ? $row->full_message : '';
            });
            $table->editColumn('tokens', function ($row) {
                return $row->tokens ? $row->tokens : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phone_number', function ($row) {
                return $row->phone_number ? $row->phone_number : '';
            });
            $table->editColumn('phone_number_2', function ($row) {
                return $row->phone_number_2 ? $row->phone_number_2 : '';
            });
            $table->editColumn('shipping_address', function ($row) {
                return $row->shipping_address ? $row->shipping_address : '';
            });
            $table->editColumn('total_cost', function ($row) {
                return $row->total_cost ? $row->total_cost : '';
            }); 
            $table->editColumn('operating_status', function ($row) {
                return $row->operating_status ? Order::OPERATING_STATUS_SELECT[$row->operating_status] : '';
            });
            $table->addColumn('shift_id', function ($row) {
                return $row->shift ? $row->shift->id : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'shift']);

            return $table->make(true);
        }

        return view('frontend.orders.index');
    }


    public function create()
    {
        abort_if(Gate::denies('order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shifts = Shift::pluck('operating_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.orders.create', compact('cities', 'countries', 'shifts'));
    }

    public function store(StoreOrderRequest $request)
    {
        $order = Order::create($request->all());

        return redirect()->route('frontend.orders.index');
    }

    public function edit(Order $order)
    {
        abort_if(Gate::denies('order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shifts = Shift::pluck('operating_status', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $order->load('shift', 'country', 'city');

        return view('frontend.orders.edit', compact('cities', 'countries', 'order', 'shifts'));
    }

    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order->update($request->all());

        return redirect()->route('frontend.orders.index');
    }

    public function show(Order $order)
    {
        abort_if(Gate::denies('order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->load('shift', 'country', 'city', 'orderOrderDetails');

        return view('frontend.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        abort_if(Gate::denies('order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $order->delete();

        return back();
    }

    public function massUpdateStages(MassUpdateStagesOrderRequest $request)
    {
        $orders = Order::find(request('ids'));

        foreach ($orders as $order) {
            $order->operating_status = $request->stage;
            $order->save();
        }

        alert('تم بنجاح','','success');
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
