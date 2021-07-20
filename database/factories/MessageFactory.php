<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use App\User;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    return [
        'sender_name' => $faker->name(),
        'content' => $faker->text(),
        'user_id' => rand(1,22),
        'created_at'=> $faker->date('2021-01-01','now')
    ];
});
