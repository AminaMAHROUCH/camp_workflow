<?php

namespace App\Http\Requests;

use App\Agenda;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAgendaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agenda_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'date'    => [
                'required'
            ],
            'content' => [
                'required',
            ],
        ];
    }
}