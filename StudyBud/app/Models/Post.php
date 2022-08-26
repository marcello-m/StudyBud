<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['user_id', 'course_id', 'content'];
    protected $primaryKey = 'post_id';
    public $timestamps = false;

    public function user() //restituisce oggetto di tipo author
    {
        return $this->belongsTo('App\Models\SBUser', 'user_id');
    }

    public function course() //restituisce oggetto di tipo course
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id');
    }
}
