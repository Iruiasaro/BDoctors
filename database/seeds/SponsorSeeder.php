<?php

use Illuminate\Database\Seeder;
use App\Sponsor;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Sponsor::truncate();

        $sponsor_type = [
            [
                "name" => "bronze",
                "price" => 2.99,
                "duration" => 24,
                "color" => 'sandybrown'
            ],
            [
                "name" => "silver",
                "price" => 5.99,
                "duration" => 72,
                "color" => "silver"
            ],
            [
                "name" => "gold",
                "price" => 9.99,
                "duration" => 144,
                "color" => "gold"
            ]
        ];

        foreach ($sponsor_type as $sponsor) {
            $sponsor_obj = new Sponsor();
            $sponsor_obj->name_plan = $sponsor['name'];
            $sponsor_obj->price = $sponsor['price'];
            $sponsor_obj->duration = $sponsor['duration'];
            $sponsor_obj->color = $sponsor['color'];
            $sponsor_obj->save();
        }
    }
}

