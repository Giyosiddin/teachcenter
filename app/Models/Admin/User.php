<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    // use SoftDeletes;
    // use Notifiable;

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datatime',
    ];
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class,'user_courses');
    }
    public function isBuyer()
    {
        return $this->roles()->where('name','buyer')->exists();
    }
    public function isGrant()
    {
        return $this->roles()->where('name','grant')->exists();
    }
}
