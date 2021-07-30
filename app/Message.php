<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_name', 'content', 'user_id'
    ];
    public function user()
    {
        return $this->belongsTo("App\User");
    }
}
    