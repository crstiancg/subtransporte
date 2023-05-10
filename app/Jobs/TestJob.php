<?php

namespace App\Jobs;

use App\Models\Infraccion;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        sleep(10);
        $uit = 4950;
        $bases = Infraccion::where('estado', '=', 'base')->get();
        foreach ($bases as $base) {

            $tipo = $base->tipo;
            $benefi = $base->tipo->beneficios->sortBy('orden')->first();
            //dd();
            $base->monto_final = ($uit * $tipo->porcentaje_base) * $benefi->descuento;
            //cambiar estado
            //$base->estado=$benefi->codigo;
            $base->save();
            //dd($base);
        }

        $infracion = Infraccion::find(4);
        $infracion->calcularEstado();
        echo "job dispached<br>";
        Log::info("job dispached");
    }
}
