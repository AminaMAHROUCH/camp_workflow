<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Helper;

class WorkshopResource extends JsonResource
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
            'title' => $this->title,
            'excerpt' => $this->excerpt,
            'content' => $this->content,
            'video' => $this->video,
            'startAt' => Helper::formatDate($this->start_at),
            'endAt' => Helper::formatDate($this->end_at),
            'duration' => $this->duration,
            'quiz' => $this->quiz,
            'evaluation' => $this->evaluation,
            'images' => $this->imagesUrls,
            'responsible' => $this->responsible()->select('id', 'name')->first(),
        ];
    }
}
