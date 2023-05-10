<?php

namespace App\Http\Controllers;

use App\Models\Infraccion;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class InfraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $monto = env('UIT',4950);

        return Inertia::render('Infraccion/Index');
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
        //
        
        $placa=$request->search;
        $infraccion = DB::table('infraccions')
                ->where('cod_placa', '=', $request->search )
                ->get();
                //dd($infraccion);
        return Inertia::render('Infraccion/Index', compact('infraccion'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Infraccion $infraccion)
    {
        //
        return Inertia::render($infraccion);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Infraccion $infraccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Infraccion $infraccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Infraccion $infraccion)
    {
        //
    }
}
