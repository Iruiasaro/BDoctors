<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SpecializationUser;
use App\Model;
use Faker\Generator as Faker;

$factory->define(SpecializationUser::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,3210),
        'specialization_id' => rand(1,22),
    ];
});
