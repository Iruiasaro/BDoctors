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
        $specialization = ["Medicina interna", "Geriatria", "Medicina dello sport", "Medicina termale", "Oncologia medica", "Medicina di comunità", "Allergologia ed Immunologia clinica", "Dermatologia e Venereologia", "Ematologia", "Endocrinologia e malattie del ricambio", "Gastroenterologia", "Malattie dell’apparato cardiovascolare", "Malattie dell’apparato respiratorio", " Malattie infettive", " Medicina tropicale", " Nefrologia", "Reumatologia", "Neurofisiopatologia", "Neurologia", "Neuropsichiatria infantile", "Psicologia clinica", "Pediatria"];

        foreach ($specialization as $spec) {
            $spec_obj = new Specialization();
            $spec_obj->specs_type = $spec;
            $spec_obj->save();
        }
    }
}
