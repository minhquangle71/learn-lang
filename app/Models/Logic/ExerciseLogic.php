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
        return $query->where('original', $answer);
    }

    function scopeForIsCorrect($query, $param): Builder
    {
        return $query->byParams($param);
    }

    function scopeByLesson($query, $lesson_id): Builder
    {
        return $query->where('lesson_id', $lesson_id);
    }

    function scopeExcludeIds($query, $ids): Builder
    {
        return $query->whereNotIn('id', (array) $ids);
    }

    function scopeByNodeId($query, $node_id): Builder
    {
        return $query->whereIn('node_id', (array) $node_id);
    }

    function scopeByParams($query, $param): Builder
    {
        if (isset($param[PARAM_CURRENT_ID])) {
            $query->byId($param[PARAM_CURRENT_ID]);
        }

        if (isset($param[PARAM_ANSWER])) {
            $query->byAnswer($param[PARAM_ANSWER]);
        }

        return $query;
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

    public static function generateExercise($exclude_ids, $node_id)
    {
        return static::byNodeId($node_id)
            ->excludeIds($exclude_ids)
            ->get()
            ->shuffle()
            ->first();
    }

    public static function totalQuestionByLesson($lesson_id)
    {
        return static::byLesson($lesson_id)
            ->count();
    }

    public static function totalQuestionByNode($node_id)
    {
        return static::byNodeId($node_id)
            ->count();
    }
}
