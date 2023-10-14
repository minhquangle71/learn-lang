<?php

namespace App\Models\Logic;

use App\Models\DTO\Exercise;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait NodesLogic
{
    /**
     * ---------------------------------------------------------------------
     * Relationship
     * ---------------------------------------------------------------------
     */
    public function exercises(): HasMany
    {
        return $this->hasMany(Exercise::class, 'node_id', 'id');
    }

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
            'levels',
            'created_at',
            'updated_at',
        ]);
    }

    public function scopeByPath($query, $path): Builder
    {
        return $query->where('path', $path);
    }

    public function scopeForRoot($query): Builder
    {
        return $query->whereNull('path');
    }

    public function scopeById($query, $id): Builder
    {
        return $query->whereIn('id', (array) $id);
    }

    /**
     * ---------------------------------------------------------------------
     * Mutations
     * ---------------------------------------------------------------------
     */

    public function childs()
    {
        $path = "{$this->path}.{$this->id}";

        if (!$this->path) {
            $path = $this->id;
        }

        return $this::byPath($path)
            ->with('exercises')
            ->simple()
            ->orderBy('levels')
            ->orderBy('id', 'ASC')
            ->get();
    }

    /**
     * ---------------------------------------------------------------------
     * Attribute
     * ---------------------------------------------------------------------
     */

    public function getLabelTextAttribute()
    {
        if (!$this->exercises->count()) {
            return $this->name;
        }

        return "{$this->name} - ( {$this->exercises->count()} exercises)";
    }
}
