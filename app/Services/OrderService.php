<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Http\Request; 
use Yajra\DataTables\Facades\DataTables;

class OrderService
{
    public function getOrders($type){ 

        $transfer = 1; 
        if($type == 'pending'){
            $permission_name = 'to_overview';
            $stage_to_update = 'overview';
            $button_name = 'أرسال للمراجعة';
        }elseif($type == 'overview'){
            $permission_name = 'to_prepare_for_delivery';
            $stage_to_update = 'prepare_delviery';
            $button_name = 'أرسال للتجهيز للشحن';
        }elseif($type == 'prepare_delviery'){
            $permission_name = 'to_on_delivery';
            $stage_to_update = 'on_delivery';
            $button_name = 'أرسال لشركة الشحن';
        }elseif($type == 'on_delivery'){
            $permission_name = 'to_delivered';
            $stage_to_update = 'delivered';
            $button_name = 'تم التسليم'; 
        }elseif($type == 'delivered'){
            $permission_name = 'to_returned';
            $stage_to_update = 'returned_full';
            $button_name = 'مرتجع'; 
        }else {
            $permission_name = ' ';
            $stage_to_update = ' ';
            $button_name = '';
            $transfer = 0;
        }


        if($type == 'returned'){
            $query = Order::with(['shift', 'country', 'city'])->whereIn('operating_status',['returned_part','returned_full'])->select(sprintf('%s.*', (new Order)->table));
        }else{
            $query = Order::with(['shift', 'country', 'city'])->where('operating_status',$type)->select(sprintf('%s.*', (new Order)->table));
        }
        $table = Datatables::of($query);

        $table->addColumn('placeholder', '&nbsp;');
        $table->addColumn('actions', '&nbsp;');

        $table->editColumn('actions', function ($row) use($permission_name,$stage_to_update,$button_name,$transfer){
            $viewGate      = 'order_show';
            $editGate      = !in_array($row->operating_status,['delivered','canceled','returned_part','returned_full']) ? 'order_edit' : false;
            $deleteGate    = !in_array($row->operating_status,['delivered','canceled','returned_part','returned_full']) ? 'order_delete' : false;
            $crudRoutePart = 'orders';

            $stage = '';

            if(auth()->user()->isAdmin || !Gate::denies($permission_name)){
                if($transfer){
                    $stage = '<button class="btn btn-xs btn-success" onclick="if (confirm(`'. trans('global.areYouSure') .'`)) { window.location.href=`' . route('frontend.' . $crudRoutePart . '.updateStage', ['id' => $row->id , 'stage' => $stage_to_update]) .'`;} return false;" >
                                ' . $button_name . '
                            </button> &nbsp;';
                }
            }

            $stage2 = '';

            if(auth()->user()->isAdmin || !Gate::denies('to_canceled')){ 
                if(!in_array($row->operating_status,['delivered','canceled','returned_part','returned_full'])){
                    $stage2 = '<button class="btn btn-xs btn-warning" onclick="if (confirm(`'. trans('global.areYouSure') .'`)) { window.location.href=`' . route('frontend.' . $crudRoutePart . '.updateStage', ['id' => $row->id , 'stage' => 'canceled']) .'`;} return false;" >
                                الغاء
                            </button> &nbsp;'; 
                }
            }

            return $stage . $stage2 . view('partials.datatablesActions_frontend', compact(
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
        $table->editColumn('tokens', function ($row) {
            return $row->tokens ? $row->tokens : '';
        });
        $table->editColumn('name', function ($row) {
            return $row->name ? $row->name : '';
        });
        $table->editColumn('phone_number', function ($row) {
            return $row->phone_number ? $row->phone_number : '';
        });
        $table->editColumn('phone_number_2', function ($row) {
            return $row->phone_number_2 ? $row->phone_number_2 : '';
        });
        $table->editColumn('shipping_address', function ($row) {
            return $row->shipping_address ? $row->shipping_address : '';
        });
        $table->editColumn('total_cost', function ($row) {
            return $row->total_cost ? $row->total_cost : '';
        }); 
        $table->editColumn('operating_status', function ($row) {
            return $row->operating_status ? Order::OPERATING_STATUS_SELECT[$row->operating_status] : '';
        });
        $table->addColumn('shift_id', function ($row) {
            return $row->shift ? $row->shift->id : '';
        });

        $table->rawColumns(['actions', 'placeholder', 'shift']);

        return $table->make(true); 
    }
}