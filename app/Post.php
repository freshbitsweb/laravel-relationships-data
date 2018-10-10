<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get all of the post's likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
