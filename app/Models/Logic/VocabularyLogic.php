<?php

namespace App\Models\Logic;

trait VocabularyLogic
{

    /*
    * Scope query
    */
    public function scopeSimple($query)
    {
        return $query->select([
            'id',
            'value',
            'mean',
            'example',
            'kanji',
            'lesson_id',
            'explain'
        ]);
    }

    public function scopeByLessonId($query, $lesson_id)
    {
        return $query->where('lesson_id', $lesson_id)
            ->simple();
    }

    public function scopeById($query, $id)
    {
        if (is_array($id)) {
            return $query->whereIn('id', $id);
        }
        return $query->where('id', $id);
    }

    public function scopeGenerateQuestion($query, $ids)
    {
        return $query->byId($ids)->simple();
    }
}
