<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReturnedRequest;
use App\Http\Requests\StoreReturnedRequest;
use App\Http\Requests\UpdateReturnedRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReturnedController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('returned_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.returneds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('returned_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.returneds.create');
    }

    public function store(StoreReturnedRequest $request)
    {
        $returned = Returned::create($request->all());

        return redirect()->route('admin.returneds.index');
    }

    public function edit(Returned $returned)
    {
        abort_if(Gate::denies('returned_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.returneds.edit', compact('returned'));
    }

    public function update(UpdateReturnedRequest $request, Returned $returned)
    {
        $returned->update($request->all());

        return redirect()->route('admin.returneds.index');
    }

    public function show(Returned $returned)
    {
        abort_if(Gate::denies('returned_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.returneds.show', compact('returned'));
    }

    public function destroy(Returned $returned)
    {
        abort_if(Gate::denies('returned_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $returned->delete();

        return back();
    }

    public function massDestroy(MassDestroyReturnedRequest $request)
    {
        $returneds = Returned::find(request('ids'));

        foreach ($returneds as $returned) {
            $returned->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
