<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOnDeliveryRequest;
use App\Http\Requests\StoreOnDeliveryRequest;
use App\Http\Requests\UpdateOnDeliveryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnDeliveryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('on_delivery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onDeliveries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('on_delivery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onDeliveries.create');
    }

    public function store(StoreOnDeliveryRequest $request)
    {
        $onDelivery = OnDelivery::create($request->all());

        return redirect()->route('admin.on-deliveries.index');
    }

    public function edit(OnDelivery $onDelivery)
    {
        abort_if(Gate::denies('on_delivery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onDeliveries.edit', compact('onDelivery'));
    }

    public function update(UpdateOnDeliveryRequest $request, OnDelivery $onDelivery)
    {
        $onDelivery->update($request->all());

        return redirect()->route('admin.on-deliveries.index');
    }

    public function show(OnDelivery $onDelivery)
    {
        abort_if(Gate::denies('on_delivery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.onDeliveries.show', compact('onDelivery'));
    }

    public function destroy(OnDelivery $onDelivery)
    {
        abort_if(Gate::denies('on_delivery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $onDelivery->delete();

        return back();
    }

    public function massDestroy(MassDestroyOnDeliveryRequest $request)
    {
        $onDeliveries = OnDelivery::find(request('ids'));

        foreach ($onDeliveries as $onDelivery) {
            $onDelivery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
