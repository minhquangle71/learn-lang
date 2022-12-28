<?php

namespace App\Models;

use App\Models\Logic\VocabularyLogic;
use Illuminate\Database\Eloquent\Model;

class Vocabulary extends Model
{
    use VocabularyLogic;

    protected $table      = 'vocabulary';
    protected $id         = 'id';
    public    $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'value',
        'mean',
        'explain',
        'example',
        'kanji',
        'lesson_id'
    ];
}
