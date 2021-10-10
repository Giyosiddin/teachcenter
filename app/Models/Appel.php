<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appel extends Model
{
    use HasFactory;
    protected $guarded = [];   
    protected $fillable =[
        'id',
        'fullname',
        'phone',
        'country',
        'email',
        'type',
        'message',
        'direction',
        'created_at',
        'updated_at'
    ];
}
