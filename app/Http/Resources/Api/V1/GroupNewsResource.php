<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Helpers\Helper;

class GroupNewsResource extends JsonResource
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
            'published_at' => Helper::formatDateP($this->published_at),
            'images' => $this->imagesUrls,
            'responsible' => $this->responsible()->select('id', 'name')->get(),
        ];
    }
}


       