<?php

namespace App\Http\Requests;

use App\Models\Client;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClientRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('client_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'company_name' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'domain' => [
                'string',
                'required',
                'unique:domains,domain'
            ],
        ];
    }
}
