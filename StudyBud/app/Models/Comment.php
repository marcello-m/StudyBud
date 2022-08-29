<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['user_id', 'post_id', 'content'];
    protected $primaryKey = 'comment_id';
    public $timestamps = false;

    public function user() //restituisce oggetto di tipo user
    {
        return $this->belongsTo('App\Models\SBUser', 'user_id');
    }

    public function post() //restituisce oggetto di tipo course
    {
        return $this->belongsTo('App\Models\Post', 'post_id');
    }
}
