<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDeliveredRequest;
use App\Http\Requests\StoreDeliveredRequest;
use App\Http\Requests\UpdateDeliveredRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DeliveredController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('delivered_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivereds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('delivered_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivereds.create');
    }

    public function store(StoreDeliveredRequest $request)
    {
        $delivered = Delivered::create($request->all());

        return redirect()->route('admin.delivereds.index');
    }

    public function edit(Delivered $delivered)
    {
        abort_if(Gate::denies('delivered_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivereds.edit', compact('delivered'));
    }

    public function update(UpdateDeliveredRequest $request, Delivered $delivered)
    {
        $delivered->update($request->all());

        return redirect()->route('admin.delivereds.index');
    }

    public function show(Delivered $delivered)
    {
        abort_if(Gate::denies('delivered_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.delivereds.show', compact('delivered'));
    }

    public function destroy(Delivered $delivered)
    {
        abort_if(Gate::denies('delivered_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $delivered->delete();

        return back();
    }

    public function massDestroy(MassDestroyDeliveredRequest $request)
    {
        $delivereds = Delivered::find(request('ids'));

        foreach ($delivereds as $delivered) {
            $delivered->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
