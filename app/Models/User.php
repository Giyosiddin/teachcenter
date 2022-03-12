<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany( Role::class, 'user_roles');
    }

    public function isAdmin()
    {
        return $this->roles()->where('name','admin')->exists();
    }

    public function isUser()
    {
        return $this->roles()->where('name','user')->exists();
    }
    public function isBuyer()
    {
        return $this->roles()->where('name','buyer')->exists();
    }
    public function isGrant()
    {
        return $this->roles()->where('name','grant')->exists();
    }
    public function isDisabled()
    {
        return $this->roles()->where('name','disabled')->exists();
    }
    public function courses()
    {
        return $this->belongsToMany(Course::class,'user_courses');
    }
    public function isUserCourse($course_id)
    {
        $user_courses = $this->courses()->pluck('id')->toArray();
        if(in_array($course_id,$user_courses)){
            return true;
        }else{
            return false;
        }
    }
}
