<?php

namespace App\Http\Requests;

use App\WorkshopResponsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateWorkshopResponsibleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('workshop_responsible_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'      => [
                'required',
            ],
            'city'      => [
                'required',
            ],
            'tel_1'     => [
                'required',
            ],
            'tel_2'     => [
                'nullable',
            ],
            'email'     => [
                'required',
                'unique:workshop_responsibles,email,' . request()->route('workshop_responsible')->id,
            ],
            'bank_code' => [
                'required',
               
            ],
        ];
    }
}
