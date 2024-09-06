<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Services\OrderService;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReturnedController extends Controller
{
    protected $orderService;
    public function __construct(OrderService $orderService){
        $this->orderService = $orderService;
    }
    public function index(Request $request)
    {
        abort_if(Gate::denies('returned_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            return $this->orderService->getOrders('returned');
        }

        return view('frontend.returneds.index');
    }

}
