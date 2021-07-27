<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        App\User::truncate();
        $this->call([
            CitySeeder::class,
            SpecializationSeeder::class,
            SponsorSeeder::class,
            MessageSeeder::class,
            SpecializationUserSeeder::class,
            ReviewSeeder::class,
            UserSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
