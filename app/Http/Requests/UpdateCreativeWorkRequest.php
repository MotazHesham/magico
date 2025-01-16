<?php

namespace App\Http\Requests;

use App\Models\CreativeWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCreativeWorkRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('creative_work_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'title_1' => [
                'string',
                'nullable',
            ],
            'title_2' => [
                'string',
                'nullable',
            ],
        ];
    }
}
