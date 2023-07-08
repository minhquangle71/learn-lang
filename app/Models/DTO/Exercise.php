<?php

namespace App\Models\DTO;

use App\Models\Logic\ExerciseLogic;
use Illuminate\Database\Eloquent\Model;

class
Exercise extends Model
{
    use ExerciseLogic;

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'exercise';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'japan_val',
        'vn_val',
        'romaji',
        'tag',
        'note',
        'lesson_id',
        'created_at',
        'updated_at'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}
