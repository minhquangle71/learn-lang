<?php

namespace App\Models\Logic;

use Illuminate\Database\Eloquent\Builder;

trait ExerciseLogic
{

    /**
     *
     * Scope builder query
     *
     */
    function scopeById($query, $id): Builder
    {
        return $query->where('id', $id);
    }

    function scopeByAnswer($query, $answer): Builder
    {
        return $query->where('japan_val', $answer);
    }

    function scopeForIsCorrect($query, $param): Builder
    {
        return $query->byId($param['current_question'])
            ->byAnswer($param['answer']);
    }

    function scopeByLesson($query, $lesson_id): Builder
    {
        return $query->where('lesson_id', $lesson_id);
    }

    function scopeExcludeIds($query, $ids): Builder
    {
        return $query->whereNotIn('id', (array) $ids);
    }

    /**
     *
     * Helper function
     *
     */

    public static function isCorrect($param)
    {
        return static::forIsCorrect($param)
            ->first();
    }

    public static function generateExercise($current_question, $lesson_id)
    {
        return static::byLesson($lesson_id)
            ->excludeIds($current_question)
            ->get()
            ->shuffle()
            ->first();
    }

    public static function totalQuestionByLesson($lesson_id)
    {
        return static::byLesson($lesson_id)
            ->count();
    }
}
