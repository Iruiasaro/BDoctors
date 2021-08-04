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
        "Genova",
        "Bologna",
        "Firenze",
        "Bari",
        "Catania",
        "Verona",
        "Venezia",
        "Messina",
        "Padova",
        "Parma",
        "Trieste",
        "Brescia",
        "Prato",
        "Taranto",
        "Modena",
        "Reggio Calabria",
        "Reggio Emilia",
        "Perugia",
        "Ravenna",
        "Livorno",
        "Cagliari",
        "Rimini",
        "Foggia",
        "Ferrara",
        "Salerno",
        "Latina",
        "Sassari",
        "Monza",
        "Trento",
        "Bergamo",
        "Giugliano in Campania",
        "Pescara",
        "Siracusa",
        "Forlì",
        "Vicenza",
        "Terni",
        "Bolzano",
        "Piacenza",
        "Novara",
        "Udine",
        "Ancona",
        "Andria",
        "Arezzo",
        "Cesena",
        "Pesaro",
        "Lecce",
        "Barletta",
        "Alessandria",
        "La Spezia",
        "Pistoia",
        "Pisa",
        "Lucca",
        "Guidonia Montecelio",
        "Catanzaro",
        "Como",
        "Senigallia",
        "Carlopoli",

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
