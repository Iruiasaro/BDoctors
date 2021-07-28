<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecializationUser extends Model
{
    protected $table = 'specialization_users';
    protected $fillable = [
        'user_id', 'specialization_id', 'created_at', 'updated_at'
    ];

}
