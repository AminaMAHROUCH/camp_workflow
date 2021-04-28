<?php

namespace App\Http\Requests;

use App\GroupNews;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreGroupNewsRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('group_news_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

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
            'published_at'   => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'responsible_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
