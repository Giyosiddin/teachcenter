<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\LessonTranslation;

class Lesson extends Model
{
    use HasFactory;
    public $guarded = [];
    public function translation()
    {
        return $this->hasOne(LessonTranslation::class);
    }
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
