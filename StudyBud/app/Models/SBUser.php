<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SBUser extends Model
{
    use HasFactory;
    protected $table = 'sb_users';
    protected $fillable = ['username','full_name','email','password','institution','degree','major','year','credits','role'];
    protected $primaryKey = 'user_id';

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    public function course() 
    {
        return $this->hasOne('App\Models\Course', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'courses_sb_users', 'user_id', 'course_id');
    }
}
