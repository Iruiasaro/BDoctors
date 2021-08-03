<?php

use Illuminate\Database\Seeder;

class SpecializationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SpecializationUser::truncate();
        factory(App\SpecializationUser::class, 18000)->create();
    }
}
