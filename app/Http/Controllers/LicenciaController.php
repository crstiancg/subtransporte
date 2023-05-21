<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Licencia');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $placa=$request->search;
        $licencia = DB::table('licencias')
                ->where('cod_empresa', '=', $request->search )
                ->get();
                //dd($licencia);
        return Inertia::render('Licencia', compact('licencia'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Licencia $licencia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Licencia $licencia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Licencia $licencia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Licencia $licencia)
    {
        //
    }
}
