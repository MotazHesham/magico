<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPendingRequest;
use App\Http\Requests\StorePendingRequest;
use App\Http\Requests\UpdatePendingRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PendingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pending_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendings.index');
    }

    public function create()
    {
        abort_if(Gate::denies('pending_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendings.create');
    }

    public function store(StorePendingRequest $request)
    {
        $pending = Pending::create($request->all());

        return redirect()->route('admin.pendings.index');
    }

    public function edit(Pending $pending)
    {
        abort_if(Gate::denies('pending_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendings.edit', compact('pending'));
    }

    public function update(UpdatePendingRequest $request, Pending $pending)
    {
        $pending->update($request->all());

        return redirect()->route('admin.pendings.index');
    }

    public function show(Pending $pending)
    {
        abort_if(Gate::denies('pending_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pendings.show', compact('pending'));
    }

    public function destroy(Pending $pending)
    {
        abort_if(Gate::denies('pending_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pending->delete();

        return back();
    }

    public function massDestroy(MassDestroyPendingRequest $request)
    {
        $pendings = Pending::find(request('ids'));

        foreach ($pendings as $pending) {
            $pending->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
