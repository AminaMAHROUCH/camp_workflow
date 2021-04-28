<?php

namespace App\Http\Requests;

use App\GroupResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyGroupResponsibleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('group_responsible_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:group_responsibles,id',
        ];
    }
}
