<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $fillable =[
        'name_uz',
        'name_ru',
        'name_en',
        'information_uz',
        'information_ru',
        'information_en',
        'position_uz',
        'position_ru',
        'position_en',
        'image'
    ];

    public $timestamps = false;
    
}
