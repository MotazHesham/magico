<?php

namespace App\Http\Requests;

use App\Models\Package;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('package_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'required',
            ],
            'price' => [
                'required',
            ],
            'tokens' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
