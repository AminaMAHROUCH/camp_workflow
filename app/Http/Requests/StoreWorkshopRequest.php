<?php

namespace App\Http\Requests;

use App\Workshop;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreWorkshopRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('workshop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'title'          => [
                'required',
            ],
            'content'        => [
                'required',
            ],
            'start_at'       => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
            'end_at'         => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'responsible_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
