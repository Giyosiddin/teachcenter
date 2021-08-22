<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseTranslation extends Model
{
    use HasFactory;
    
    public $guarded = [];
    protected $fillable =[
        'id',
        'course_id',
        'locale',
        'title',
        'description',
        'body',
        'details'        
    ];
    public $timestamps = false;
    public $table = "courses_translation";

}
