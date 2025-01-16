<?php

namespace App\Http\Requests;

use App\Models\Slider;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSliderRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('slider_edit');
    }

    public function rules()
    {
        return [
            'image' => [
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'headline_1' => [
                'string',
                'nullable',
            ],
            'headline_2' => [
                'string',
                'nullable',
            ],
            'button_name' => [
                'string',
                'nullable',
            ],
            'link' => [
                'string',
                'nullable',
            ],
        ];
    }
}
