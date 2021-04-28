<?php

namespace App\Http\Resources\Api\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'group' => $this->group,
            'token' => $this->getToken(),
            'role' => $this->role,
            'responsibleId' => $this->responsible_id ?? null,
            'UKey' => $this->UKey,
        ];
    }
}
