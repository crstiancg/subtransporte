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
        $beneficio = [
            ['id' => 1, 'codigo' => 'DESC17', 'orden' => 10, 'descuento' => 0.17],
            ['id' => 2, 'codigo' => 'DESC33', 'orden' => 20, 'descuento' => 0.33],
            ['id' => 3, 'codigo' => 'DESC50', 'orden' => 30, 'descuento' => 0.50],
            ['id' => 4, 'codigo' => 'DESC70', 'orden' => 40, 'descuento' => 0.70],
            ['id' => 5, 'codigo' => 'DESC100', 'orden' => 50, 'descuento' => 1],
        ];

        foreach ($beneficio as $ben) {
            Beneficio::create($ben);
        }


    }
}
