<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Teacher;

class Course extends Model
{
    use HasFactory;

    public $guarded = [];
    protected $fillable =[
        'id',
        'order',
        'teacher_id',
        'category_id',
        'image',
        'created_at',
        'updated_at'
    ];

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
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
