<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $fillable = [
        'user_id', 'title', 'content', 'vote', 'created_at'
    ];

    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
