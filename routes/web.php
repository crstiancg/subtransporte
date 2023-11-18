<?php

use App\Http\Controllers\CirculacionController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\InfraccionController;
use App\Http\Controllers\LicenciaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestController;
use App\Jobs\TestJob;
use App\Models\Infraccion;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;

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



// function desc17():bool
// {
//     $fechaIncidente = Carbon::create('2023-05-4 23:26:11.223');
//     $fechaActual = Carbon::now();

//     //echo "hola";
//     return $fechaActual->diffInDays($fechaIncidente)>=5?false:true;
// }
// Route::get('job',function(){
//     $uit = 4950;
//         $bases = Infraccion::where('estado', '=', 'base')->get();
//         foreach ($bases as $base) {

//             $tipo = $base->tipo;
//             $benefi = $base->tipo->beneficios->sortBy('orden')->first();
//             //dd();
//             $condicion = $base->tipo->beneficios->sortBy('orden')->first()->condicion;

//             switch ($condicion) {
//                 case "DESC17":
//                     if (desc17()) {
//                         $base->monto_final = ($uit * $tipo->porcentaje_base) * $benefi->descuento;
//                         $base->save();
//                     } else {
//                         $base->estado = "dias";
//                         $base->save();
//                     }
//                     break;
                    
//             }
//         }

//     return response("Fin");
// });

Route::get('/', function () {
    return Redirect::route('licencias.index');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('circulacion', CirculacionController::class);
    Route::get('estado/{estado}', [CirculacionController::class,'estado'])->name('circulacion.estado');
    Route::get('noautorizar/{noautorizar}', [CirculacionController::class,'noautorizar'])->name('circulacion.noautorizar');
});
Route::resource('infraccion', InfraccionController::class)->names('infraccion');
Route::resource('licencias', LicenciaController::class)->names('licencias');

Route::get('consulta', [ConsultaController::class, 'index'])->name('consulta.index');



require __DIR__.'/auth.php';
