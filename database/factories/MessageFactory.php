<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\User;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'sender_name' => $faker->name(),
        'content' => $faker->text(),
        'user_id' => rand(1,3210),
        'created_at'=> $faker->dateTimeBetween('-210 days', 'now', 'Europe/Berlin'),
    ];
});
