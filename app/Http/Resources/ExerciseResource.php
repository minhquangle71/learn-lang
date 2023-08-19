<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExerciseResource extends JsonResource
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
            'original'   => $this->original,
            'mean'       => $this->mean,
            'note'       => $this->note,
            'romaji'     => $this->romaji,
            'node_id'    => $this->node_id,
            'created_at' => $this->created_at->format(DATETIME_FORMAT_RESPONSE),
            'updated_at' => $this->updated_at->format(DATETIME_FORMAT_RESPONSE),
        ];
    }
}
