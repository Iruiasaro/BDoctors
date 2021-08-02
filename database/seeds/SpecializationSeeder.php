<?php

use Illuminate\Database\Seeder;
use App\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Specialization::truncate();

        $specialization = [ "Allergologia ed Immunologia clinica","Cardiologia","Chirurgia generale","Dermatologia e Venereologia","Endocrinologia","Geriatria","Medicina dello sport","Medicina di comunità","Medicina interna","Medicina legale","Medicina termale","Nefrologia","Oculistica","Odontoiatria","Oncologia medica","Ortopedia","Otorinolaringoiatria","Pediatria","Urologia",];

        foreach ($specialization as $spec) {
            $spec_obj = new Specialization();
            $spec_obj->specs_type = $spec;
            $spec_obj->save();
        }
    }
}
