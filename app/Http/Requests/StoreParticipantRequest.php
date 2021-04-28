<?php

namespace App\Http\Requests;

use App\Participant;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreParticipantRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('participant_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'        => [
                'required',
            ],
            'gender'      => [
                'required',
            ],
            'age'         => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'city'        => [
                'required',
            ],
           /* 'tel_1'       => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tel_2'       => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],*/
            'email'       => [
                'required',
                'unique:participants',
            ],
            'password'    => [
                'required',
            ],
            'parent_name' => [
                'required',
            ],
        ];
    }
}