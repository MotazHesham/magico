<?php

namespace App\Models;

use App\Traits\Auditable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes, Auditable, HasFactory;

    public $table = 'orders';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'full_massage',
        'tokens',
        'name',
        'phone_number',
        'phone_number_2',
        'shipping_address',
        'total_cost',
        'shipping_cost',
        'operating_status',
        'cancel_reason',
        'shift_id',
        'country_id',
        'city_id',
        'district',
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

    public function orderOrderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
