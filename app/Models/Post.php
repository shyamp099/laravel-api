<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $hidden = ['created_at'];
    protected $fillable = ['text'];
 
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
