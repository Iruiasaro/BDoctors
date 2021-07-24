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
        // App\User::truncate();

        factory(App\SpecializationUser::class, 750)->create();
        
    }
}
