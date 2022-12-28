<?php

namespace App\Models;

use App\Models\Logic\LessonLogic;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use LessonLogic;

    protected $table      = 'lesson';
    protected $id         = 'id';
    public    $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'name',
        'lang'
    ];
}
