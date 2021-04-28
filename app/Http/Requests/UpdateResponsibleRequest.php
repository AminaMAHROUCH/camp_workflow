<?php

namespace App\Http\Requests;

use App\Responsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateResponsibleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('responsible_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'      => [
                'required',
            ],
            'email'     => [
                'required',
                'unique:responsibles,email,' . request()->route('responsible')->id,
            ],
             'password'      => [
                'required',
            ],
            'tel_1'     => [
                'required',
            ],
            'tel_2'     => [
                'nullable',
            ],
            'bank_code' => [
                'nullable',
               
            ],
        ];
    }
}