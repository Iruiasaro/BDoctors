<?php

use App\City;
use Illuminate\Database\Seeder;



class CitySeeder extends Seeder
{
    public static $cities = [
        "Roma",
        "Milano",
        "Napoli",
        "Torino",
        "Palermo",

    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        App\City::truncate();
        foreach (CitySeeder::$cities as $city) {
            $cityInstance = new City();
            $cityInstance->name = $city;
            $cityInstance->save();
        }
    }
}
