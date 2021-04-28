<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Helper;

class AgendaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
         return [
            'id' => $this->id,
            'time' => Helper::formatDate($this->date, 'H:i'),
            'date' => Helper::formatDate($this->date),
            'content' => $this->content,  
        ];
    }
}


       