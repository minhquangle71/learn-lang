<?php

namespace App\Models\Logic;

use Illuminate\Database\Eloquent\Builder;

trait LessonsLogic
{
    public function scopeByLevel($query, $level): Builder
    {
        return $query->where('level', $level);
    }
}
