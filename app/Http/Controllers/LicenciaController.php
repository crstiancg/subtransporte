<?php

namespace App\Http\Controllers;

use App\Models\Licencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Throwable;

class LicenciaController extends Controller
{
    // public function render($request, Throwable $e)
    // {
    //     $response = parent::render($request, $e);

    //     if ($response->status() === 419) {
    //         return back()->with([
    //             'message' => 'The page expired, please try again.',
    //         ]);
    //     }

    //     return $response;
    // }

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
                ->where('placa', '=', $request->search )->where('estado','autorizado')
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
