<?php

namespace App\Http\Requests;

use App\Models\CreativeWork;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCreativeWorkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('creative_work_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:creative_works,id',
        ];
    }
}
