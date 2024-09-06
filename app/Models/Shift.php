<?php

namespace App\Models;

use App\Traits\Auditable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'shifts';

    protected $dates = [
        'start_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'start_date',
        'operating_status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public const OPERATING_STATUS_SELECT = [
        'pending'          => 'قيد الأنتظار',
        'overview'         => 'تحت المراجعة',
        'prepare_delviery' => 'تحهيز للشحن',
        'on_delivery'      => 'ارسال للشحن',
        'delivered'        => 'تم التسليم',
        'returned_part'    => 'مرتجع جزئي',
        'returned_full'    => 'مرتجع كامل',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getStartDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    } 
    
    public function shiftOrders()
    {
        return $this->hasMany(Order::class, 'shift_id', 'id');
    }

    public function shiftMessageGenerations()
    {
        return $this->hasMany(MessageGeneration::class, 'shift_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
