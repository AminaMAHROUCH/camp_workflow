<?php

namespace App\Http\Requests;

use App\WorkshopResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyWorkshopResponsibleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('workshop_responsible_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:workshop_responsibles,id',
        ];
    }
}