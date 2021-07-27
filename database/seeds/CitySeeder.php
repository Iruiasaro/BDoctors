<?php

use App\City;
use Illuminate\Database\Seeder;



class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            "Roma",
            "Milano",
            "Napoli",
            "Torino",
            "Palermo",
    
        ];

        App\City::truncate();
        foreach ($cities as $city) {
            $cityInstance = new City();
            $cityInstance->name = $city;
            $cityInstance->save();
        }
    }
}
