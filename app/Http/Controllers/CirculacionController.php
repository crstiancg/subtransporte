<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCirculacionRequest;
use App\Models\Licencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class CirculacionController extends Controller
{
    
    public function index():Response
    {
        $licencias =  Licencia::select('*')->get();
        // dd($licencias); ->where('estado','no_autorizado')
        return Inertia::render('Licencia/Index', compact('licencias'));
    }

  
    public function create()
    {
        return Inertia::render('Licencia/Create');
    }

 
    public function store(CreateCirculacionRequest $request)
    {
        $circulacion =  new Licencia();

        $circulacion->nombre_conductor = $request->nombre_conductor;
        $circulacion->ruta = $request->ruta;
        $circulacion->placa = $request->placa;
        $circulacion->codigo = $request->codigo;
        $circulacion->empresa = $request->empresa;

        $circulacion->save();

        return Redirect::route('circulacion.index');
    }


    public function show(string $id)
    {
        //
    }

  
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

   
    // public function destroy(Licencia $licencia)
    // {
    //     if($licencia->estado == 'no_autorizado'){
    //         $licencia->estado = 'autorizado';
    //     }else {
    //         $licencia->estado = 'no_autorizado';
    //     }

    //     $licencia->save();

    //     return Redirect::back();
    // }

    public function estado($licencia)
    {

        $estado = Licencia::find($licencia);
        // $licencia->nombre_conductor = "";
        // $licencia->ruta = "";
        // $licencia->placa = "";
        // $licencia->codigo = "";
        // $licencia->empresa = "";
        // $licencia->estado = 'autorizado';
        // return "";
        // $findid = Licencia::find($id);

        // \dump($findid);
        // $licencia->update([
        //     'estado' => $licencia->estado == 'no_autorizado' ? $licencia->estado = 'autorizado' : $licencia->estado = 'no_autorizado'
        // ]);
        if($estado->estado == 'no_autorizado'){
            $estado->estado = 'autorizado';
        }else {
            $estado->estado = 'no_autorizado';
        }

        // $licencia->save();

        $estado->save();


        return Redirect::back();
    }
}
