<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\InfraccionController;
use App\Http\Controllers\ProfileController;
use App\Jobs\TestJob;
use App\Models\Infraccion;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('job',function(){
    $uit=4950;
    $bases=Infraccion::where('estado','=','base')->get();
    foreach($bases as $base){

        $tipo=$base->tipo;
        $benefi=$base->tipo->beneficios->sortBy('orden')->first();
        //dd();
        $base->monto_final=($uit*$tipo->porcentaje_base)*$benefi->descuento;
        $base->save();
        //dd($base);
    }
    return response("Fin");
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('infraccion', InfraccionController::class);
});

Route::get('consulta', [ConsultaController::class, 'index'])->name('consulta.index');



require __DIR__.'/auth.php';
