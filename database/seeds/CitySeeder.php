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
        "Treviso",
        "Brindisi",
        "Busto Arsizio",
        "Torre del Greco",
        "Grosseto",
        "Sesto San Giovanni",
        "Marsala",
        "Varese",
        "Pozzuoli",
        "Fiumicino",
        "Corigliano-Rossano",
        "Casoria",
        "Asti",
        "Caserta",
        "Cinisello Balsamo",
        "Aprilia",
        "Carpi",
        "Gela",
        "Cremona",
        "Pavia",
        "Ragusa",
        "Imola",
        "L'Aquila",
        "Altamura",
        "Quartu Sant'Elena",
        "Lamezia Terme",
        "Massa",
        "Potenza",
        "Trapani",
        "Viterbo",
        "Cosenza",
        "Castellammare di Stabia",
        "Afragola",
        "Vittoria",
        "Vigevano",
        "Pomezia",
        "Carrara",
        "Matera",
        "Crotone",
        "Olbia",
        "Fano",
        "Viareggio",
        "Caltanissetta",
        "Legnano",
        "Acerra",
        "Savona",
        "Faenza",
        "Benevento",
        "Marano di Napoli",
        "Molfetta",
        "Moncalieri",
        "Agrigento",
        "Cuneo",
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
