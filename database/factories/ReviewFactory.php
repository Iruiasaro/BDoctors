<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Review;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,5210),
        'content' => $faker->text(),
        'vote'=>rand(1,5),
        'title'=>$faker->text(50),
        'created_at'=> $faker->dateTimeBetween('-120 days', $endDate = 'now', 'Europe/Berlin'),
    ];
});
