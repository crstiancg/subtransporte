<?php

namespace App\Console\Commands;

use App\Models\Infraccion;
use Illuminate\Console\Command;

class TestAutoTask extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pruebas:task';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'realizar pruebas de automatizacion de tareas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //

        $infracion=Infraccion::find(4);
        $saludo="hola";
        dd($infracion->calcularEstado());
        return Command::SUCCESS;
    }
}
