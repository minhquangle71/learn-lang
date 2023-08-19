<?php

namespace App\Models\Logic;

use Illuminate\Database\Eloquent\Builder;

trait NodesLogic
{
    /**
     * ---------------------------------------------------------------------
     * Scope
     * ---------------------------------------------------------------------
     */
    public function scopeSimple($query): Builder
    {
        return $query->select([
            'id',
            'name',
            'path',
            'created_at',
            'updated_at',
        ]);
    }

    public function scopeByPath($query, $path): Builder
    {
        return $query->where('path', 'like', "{$path}%");
    }

    public function scopeForRoot($query): Builder
    {
        return $query->whereNull('path');
    }

    /**
     * ---------------------------------------------------------------------
     * Mutations
     * ---------------------------------------------------------------------
     */

    public function childs()
    {
        return $this::byPath($this->id)->simple()->get();
    }
}
