<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * Get all of the owning likeable models.
     */
    public function likeable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that liked the model.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
