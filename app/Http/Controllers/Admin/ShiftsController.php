<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShiftRequest;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShiftsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('shift_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Shift::with(['user'])->select(sprintf('%s.*', (new Shift)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'shift_show';
                $editGate      = 'shift_edit';
                $deleteGate    = 'shift_delete';
                $crudRoutePart = 'shifts';

                return view('partials.datatablesActions', compact(
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
            $table->addColumn('user_name', function ($row) {
                return $row->user ? $row->user->name : '';
            });

            $table->editColumn('operating_status', function ($row) {
                return $row->operating_status ? Shift::OPERATING_STATUS_SELECT[$row->operating_status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'user']);

            return $table->make(true);
        }

        return view('admin.shifts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('shift_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.shifts.create', compact('users'));
    }

    public function store(StoreShiftRequest $request)
    {
        $shift = Shift::create($request->all());

        return redirect()->route('admin.shifts.index');
    }

    public function edit(Shift $shift)
    {
        abort_if(Gate::denies('shift_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $shift->load('user');

        return view('admin.shifts.edit', compact('shift', 'users'));
    }

    public function update(UpdateShiftRequest $request, Shift $shift)
    {
        $shift->update($request->all());

        return redirect()->route('admin.shifts.index');
    }

    public function show(Shift $shift)
    {
        abort_if(Gate::denies('shift_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shift->load('user', 'shiftOrders');

        return view('admin.shifts.show', compact('shift'));
    }

    public function destroy(Shift $shift)
    {
        abort_if(Gate::denies('shift_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shift->delete();

        return back();
    }

    public function massDestroy(MassDestroyShiftRequest $request)
    {
        $shifts = Shift::find(request('ids'));

        foreach ($shifts as $shift) {
            $shift->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
