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
            'japan_val'  => $this->japan_val,
            'vn_val'     => $this->van_val,
            'romaji'     => $this->romaji,
            'tag'        => $this->tag,
            'note'       => $this->note,
            'lesson_id'  => $this->lesson_id,
            'created_at' => $this->created_at->format(DATE_TIME_FORMAT),
            'updated_at' => $this->updated_at->format(DATE_TIME_FORMAT),
        ];
    }
}
