<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    /**
     * Get all of the video's likes.
     */
    public function likes()
    {
        return $this->morphMany('App\Like', 'likeable');
    }
}
