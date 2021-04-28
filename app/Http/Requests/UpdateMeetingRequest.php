<?php

namespace App\Http\Requests;

use App\Meeting;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateMeetingRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('meeting_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'group_id' => [
                'required',
                'integer',
            ],
            'link'     => [
                'required',
            ],
        ];
    }
}