<?php

namespace App\Http\Requests;

use App\Models\City;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCityRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('city_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'cost' => [
                'required',
            ],
            'code' => [
                'string',
                'required',
            ],
            'country_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
