<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NodesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'         => $this->id,
            'name'       => $this->name,
            'path'       => $this->path,
            'levels'     => $this->levels,
            'created_at' => $this->created_at->format(DATETIME_FORMAT_RESPONSE),
            'updated_at' => $this->updated_at->format(DATETIME_FORMAT_RESPONSE),
        ];
    }
}
