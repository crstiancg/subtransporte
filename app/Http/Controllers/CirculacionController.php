<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCirculacionRequest;
use App\Models\Licencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Inertia\Response;

class CirculacionController extends Controller
{
    
    public function index():Response
    {
        $licencias =  Licencia::select('*')->orderBy('id','desc')->get();
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

        $circulacion->nombre_conductor = Str::upper($request->nombre_conductor);
        $circulacion->ruta = Str::upper($request->ruta);
        $circulacion->placa = Str::upper($request->placa);
        $circulacion->codigo = Str::upper($request->codigo);
        $circulacion->empresa = Str::upper($request->empresa);

        $circulacion->save();

        return Redirect::route('circulacion.index');
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

    public function estado($id)
    {

        $estado = Licencia::find($id);
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
        }

        // $licencia->save();

        $estado->save();


        return Redirect::back();
    }

    public function noautorizar($licencia){
        $estado = Licencia::find($licencia);
        if($estado->estado == 'autorizado'){
            $estado->estado = 'no_autorizado';
        }
        $estado->save();
        return Redirect::back();

    }
}
