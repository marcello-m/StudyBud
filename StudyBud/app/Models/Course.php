<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = ['name','professor_id','institution','major','year'];
    protected $primaryKey = 'course_id';

    // $course -> professor
    public function professor()
    {
        return $this->belongsTo('App\Models\SBUser', 'professor_id');
    }

    // $course -> posts
    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'course_id');
    }

    // $course -> users
    public function users()
    {
        return $this->belongsToMany('App\Models\SBUser', 'courses_sb_users', 'course_id', 'user_id');
    }
}
