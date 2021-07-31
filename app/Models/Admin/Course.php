<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Teacher;

class Course extends Model
{
    use HasFactory;

    public $guarded = [];

    public function translation()
    {
        return $this->hasOne(CourseTranslation::class);
    }
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
