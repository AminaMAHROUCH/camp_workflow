<?php

namespace App\Http\Requests;

use App\Group;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateGroupRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('group_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'           => [
                'required',
            ],
            'responsible_id' => [
                'required',
                'integer',
            ],
            'participants.*' => [
                'integer',
            ],
            'participants'   => [
                'array',
            ],
        ];
    }
}