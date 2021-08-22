<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\LessonTranslation;

class Lesson extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $fillable =[
        'id',
        'teacher_id',
        'file_first',
        'file_second',
        'video',
        'time',
        'course_id',
        'image',
        'created_at',
        'updated_at'
    ];
    public function translation()
    {
        return $this->hasOne(LessonTranslation::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
