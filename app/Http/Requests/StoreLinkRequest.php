<?php

namespace App\Http\Requests;

use App\Link;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLinkRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'fosha'    => [
                'string',
                'nullable',
            ],
            'request'    => [
                'string',
                'nullable',
            ],
            'evaluation' => [
                'string',
                'nullable',
            ],
        ];
    }
}