<?php

namespace Database\Seeders;

use App\Models\Beneficio;
use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BeneficioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //



       Beneficio::factory(10)->create();


    }
}
