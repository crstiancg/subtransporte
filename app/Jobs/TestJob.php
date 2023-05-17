<?php

namespace App\Jobs;

use App\Models\Infraccion;
use Carbon\Carbon;
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
            $condicion = $base->tipo->beneficios->sortBy('orden')->first()->condicion;

            switch ($condicion) {
                case 'DESC17':
                    if($this->desc17()) {
                        $base->monto_final = ($uit * $tipo->porcentaje_base) * $benefi->descuento;
                        $base->save();
                    } else {
                        // $base->estado = $benefi->codigo;
                        $base->estado = "dias";
                        $base->save();
                    }
                case 'DESC33':
                    if($this->desc33()){
                        $base->monto_final = ($base->monto_final * $benefi->descuento);
                    }else {
                        $base->estado = $benefi->codigo;
                        $base->save();
                    }
                case 'DESC50':
                    if(desc50()){

                    }else{

                    }
                case 'DESC100':
                    if(desc100()){

                    }else{

                    }

                    break;
            }
            //cambiar estado
            //$base->estado=$benefi->codigo;
            //$base->save();
            //dd($base);
        }

        $infracion = Infraccion::find(4);
        $infracion->calcularEstado();
        echo "job dispached<br>";
        Log::info("job dispached");
    }



    public function desc17(string $fechaIncidente):bool
    {
        $fechaIncidente = Carbon::create('2023-05-4 23:26:11.223');
        $fechaActual = Carbon::now();

        //echo "hola";
        return $fechaActual->diffInDays($fechaIncidente)>=5?false:true;
    }

    static public function desc33():bool
    {
        //$doc = $base->cod_registro();

        return true;
    }

    function desc50():bool
    {

    }

    function desc100():bool
    {

    }



}
