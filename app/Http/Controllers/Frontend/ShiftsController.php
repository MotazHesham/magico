<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyShiftRequest;
use App\Http\Requests\StoreShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Models\Shift;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ShiftsController extends Controller
{ 
    public function updateStage(Request $request){
        if(!in_array($request->stage,['overview'])){
            alert('Couldnt complete','something went wrong','warning');
            return redirect()->back();
        }
        $shift = Shift::findOrFail($request->id);
        $shift->operating_status = 'overview';
        $shift->save();

        foreach($shift->shiftOrders as $order){
            $order->operating_status = 'overview';
            $order->save();
        }
        alert('تم بنجاح', '','success');
        return redirect()->back();
    }

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
                $editGate      = 0;
                $deleteGate    = 0;
                $crudRoutePart = 'shifts';

                $stage = '';

                if(auth()->user()->isAdmin || !Gate::denies('to_overview') || auth()->user()->id == $row->user_id){
                    if($row->operating_status == 'pending'){
                        $stage = '<button class="btn btn-xs btn-success" onclick="if (confirm(`'. trans('global.areYouSure') .'`)) { window.location.href=`' . route('frontend.' . $crudRoutePart . '.updateStage', ['id' => $row->id , 'stage' => 'overview']) .'`;} return false;" >
                                    أرسال للمراجعة
                                </button> &nbsp;';
                    }
                }

                return $stage . view('partials.datatablesActions_frontend', compact(
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

        return view('frontend.shifts.index');
    }  

    public function show(Shift $shift)
    {
        abort_if(Gate::denies('shift_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $shift->load('user','shiftOrders','shiftMessageGenerations');

        return view('frontend.shifts.show', compact('shift'));
    } 
}
