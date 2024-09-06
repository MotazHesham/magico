<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller; 
use App\Models\MessageGeneration;
use App\Models\Shift;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class MessageGenerationsController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('message_generation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = MessageGeneration::with(['shift', 'order'])->select(sprintf('%s.*', (new MessageGeneration)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'message_generation_show';
                $editGate      = false;
                $deleteGate    = false;
                $crudRoutePart = 'message-generations';

                return view('partials.datatablesActions_frontend', compact(
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
            $table->editColumn('full_message', function ($row) {
                return $row->full_message ? $row->full_message : '';
            });
            $table->editColumn('response', function ($row) {
                return $row->response ? $row->response : '';
            });
            $table->editColumn('tokens', function ($row) {
                return $row->tokens ? $row->tokens : '';
            });
            $table->addColumn('shift_id', function ($row) {
                return $row->shift ? $row->shift->id : '';
            });

            $table->addColumn('order_id', function ($row) {
                return $row->order ? $row->order->id : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'shift', 'order']);

            return $table->make(true);
        }

        return view('frontend.messageGenerations.index');
    }   

    public function create(){ 
        
        $shift = Shift::firstOrCreate([
            'user_id' => auth()->user()->id,
            'start_date' => date('Y-m-d'),
            'operating_status' => 'pending',
        ]);
        
        return view('frontend.messageGenerations.create', compact('shift'));
    }

    public function show(MessageGeneration $messageGeneration)
    {
        abort_if(Gate::denies('message_generation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageGeneration->load('shift', 'order');

        return view('frontend.messageGenerations.show', compact('messageGeneration'));
    }

    public function destroy(MessageGeneration $messageGeneration)
    {
        abort_if(Gate::denies('message_generation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $messageGeneration->delete();

        return back();
    } 
}