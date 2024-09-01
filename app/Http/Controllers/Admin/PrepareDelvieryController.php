<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPrepareDelvieryRequest;
use App\Http\Requests\StorePrepareDelvieryRequest;
use App\Http\Requests\UpdatePrepareDelvieryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PrepareDelvieryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('prepare_delviery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prepareDelvieries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('prepare_delviery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prepareDelvieries.create');
    }

    public function store(StorePrepareDelvieryRequest $request)
    {
        $prepareDelviery = PrepareDelviery::create($request->all());

        return redirect()->route('admin.prepare-delvieries.index');
    }

    public function edit(PrepareDelviery $prepareDelviery)
    {
        abort_if(Gate::denies('prepare_delviery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prepareDelvieries.edit', compact('prepareDelviery'));
    }

    public function update(UpdatePrepareDelvieryRequest $request, PrepareDelviery $prepareDelviery)
    {
        $prepareDelviery->update($request->all());

        return redirect()->route('admin.prepare-delvieries.index');
    }

    public function show(PrepareDelviery $prepareDelviery)
    {
        abort_if(Gate::denies('prepare_delviery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.prepareDelvieries.show', compact('prepareDelviery'));
    }

    public function destroy(PrepareDelviery $prepareDelviery)
    {
        abort_if(Gate::denies('prepare_delviery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $prepareDelviery->delete();

        return back();
    }

    public function massDestroy(MassDestroyPrepareDelvieryRequest $request)
    {
        $prepareDelvieries = PrepareDelviery::find(request('ids'));

        foreach ($prepareDelvieries as $prepareDelviery) {
            $prepareDelviery->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
