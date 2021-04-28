<?php

namespace App\Http\Requests;

use App\Responsible;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreResponsibleRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('responsible_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
                'unique:responsibles',
            ],
            'password'  => [
                'required',
            ],
        /*    'tel_1'     => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tel_2'     => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'bank_code' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],*/
        ];
    }
}