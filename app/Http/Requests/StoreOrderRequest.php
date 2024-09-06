<?php

namespace App\Http\Requests;

use App\Models\Order;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreOrderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('order_create');
    }

    public function rules()
    {
        return [
            'full_message' => [
                'required',
            ],
            'shift_id' => [
                'required',
            ],
            'message_generation_id' => [
                'required',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'phone_number' => [
                'string',
                'nullable',
            ],
            'phone_number_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
