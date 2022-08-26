<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    use HasFactory;
    protected $table = 'universities';
    protected $fillable = ['name'];
    protected $primaryKey = 'uni_id';
    public $timestamps = false;

    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'uni_id');
    }
}
