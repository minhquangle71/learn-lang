<?php

namespace App\Models\Logic;

use App\Models\Vocabulary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait LessonLogic
{

    /*
    * Relation
    */

    public function vocabularies(): HasMany
    {
        return $this->hasMany(Vocabulary::class, 'lesson_id', 'id')->simple();
    }


    /*
    * Query Scope
    */
    public function scopeByLang($query, $lang = DEFAULT_LANGE): Builder
    {
        return $query->where('lang', $lang);
    }


    public function scopeForList($query, $param): Builder
    {
        return $query->byLang($param->lang)
            ->orderBy(DEFAULT_SORT_BY, DEFAULT_SORT_ORDER);
    }

    public function scopeById($query, $id): Builder
    {
        return $query->where('id', $id);
    }
}
