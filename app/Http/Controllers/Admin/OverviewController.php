<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyOverviewRequest;
use App\Http\Requests\StoreOverviewRequest;
use App\Http\Requests\UpdateOverviewRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OverviewController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('overview_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overviews.index');
    }

    public function create()
    {
        abort_if(Gate::denies('overview_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overviews.create');
    }

    public function store(StoreOverviewRequest $request)
    {
        $overview = Overview::create($request->all());

        return redirect()->route('admin.overviews.index');
    }

    public function edit(Overview $overview)
    {
        abort_if(Gate::denies('overview_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overviews.edit', compact('overview'));
    }

    public function update(UpdateOverviewRequest $request, Overview $overview)
    {
        $overview->update($request->all());

        return redirect()->route('admin.overviews.index');
    }

    public function show(Overview $overview)
    {
        abort_if(Gate::denies('overview_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.overviews.show', compact('overview'));
    }

    public function destroy(Overview $overview)
    {
        abort_if(Gate::denies('overview_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $overview->delete();

        return back();
    }

    public function massDestroy(MassDestroyOverviewRequest $request)
    {
        $overviews = Overview::find(request('ids'));

        foreach ($overviews as $overview) {
            $overview->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
