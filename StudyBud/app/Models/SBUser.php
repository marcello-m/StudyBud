<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SBUser extends Model
{
    use HasFactory;
    protected $table = 'sb_users';
    protected $fillable = ['username', 'profile_picture','full_name','email','password','uni_id','major','role'];
    protected $primaryKey = 'user_id';
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'user_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }

    public function course() 
    {
        return $this->hasOne('App\Models\Course', 'user_id');
    }

    public function courses()
    {
        return $this->belongsToMany('App\Models\Course', 'courses_sb_users', 'user_id', 'course_id');
        // 'nome tabella pivot', 'id user nella tabella pivot', 'id course nella tabella pivot'
    }
}
