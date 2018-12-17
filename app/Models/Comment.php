<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $hidden = ['created_at'];
    protected $fillable = ['message', 'post_id'];

    public function post()
    {
        $this->belongsTo(Post::class);
    }
}
