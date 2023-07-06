<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonsResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'level'      => $this->level,
            'name'       => $this->name,
            'created_at' => $this->created_at->format(DATE_TIME_FORMAT),
            'updated_at' => $this->updated_at->format(DATE_TIME_FORMAT),
        ];
    }
}
