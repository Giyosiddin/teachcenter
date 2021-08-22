<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonTranslation extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $fillable =[
        'id',
        'lesson_id',
        'locale',
        'title',
        'description',
        'body',
        'details'        
    ];
    public $table = 'lessons_translation';
}
