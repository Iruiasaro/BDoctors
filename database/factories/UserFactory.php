<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/


$factory->define(User::class, function (Faker $faker) {
    $genre = ["men","women"];
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password(), // password
        'remember_token' => Str::random(10),
        'curriculum' => $faker->realText(100),
        'prestazione' => $faker->realText(20),
        'image' => "https://randomuser.me/api/portraits/".$genre[rand(0,1)]."/". rand(1,100) .".jpg",
    ];
});
