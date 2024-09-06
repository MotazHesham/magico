<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveredRequest;
use App\Http\Requests\StoreDeliveredRequest;
use App\Http\Requests\UpdateDeliveredRequest;
use App\Services\OrderService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveredController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('delivered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            return $this->orderService->getOrders('delivered');
        }

        return view('frontend.delivereds.index');
    }

}
