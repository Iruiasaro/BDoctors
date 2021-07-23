<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecializationUser extends Model
{
    protected $fillable = [
        'user_id', 'specialization_id'
    ];
}
