<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CaracteristicasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InmueblesController;
use App\Http\Controllers\TipoViviendaController;
use App\Http\Controllers\VendedoresController;
use App\Http\Controllers\PropietariosController;
use App\Models\Caracteristicas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;


// use App\Http\Middleware\IsAdmin;


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

Route::get('/', function () {
   if(Auth::user()){
        if (Auth::user()->role == 'admin') {
            return Redirect::route('inmuebles.index');
        } else {
            return Redirect::route('login');
        }
   }else{
        return Redirect::route('login');
   }
   
})->name('/');

//Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('seleccion');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
//Route::get('/cambio', [App\Http\Controllers\HomeController::class, 'cambio'])->name('cambio');

// Route::get('/clients', [App\Http\Controllers\ClientController::class, 'index'])->name('clients.index');

Route::group(['middleware' => 'is.admin', 'prefix' => 'admin'], function () {
    Route::get('tipovivienda', [TipoViviendaController::class, 'index'])->name('tipovivienda.index');
    Route::get('inmuebles', [InmueblesController::class, 'index'])->name('inmuebles.index');
    Route::get('clientes', [ClientesController::class, 'index'])->name('clientes.index');
    Route::get('facturacion', [FacturaController::class, 'index'])->name('facturacion.index');
    Route::get('agenda', [AgendaController::class, 'index'])->name('agenda.index');
    Route::get('usuarios', [VendedoresController::class, 'index'])->name('vendedores.index');
    Route::get('propietarios', [PropietariosController::class, 'index'])->name('propietarios.index');
    Route::get('inmuebles/windowcard/{id}', [InmueblesController::class, 'pdf'])->name('inmuebles.generar');
    Route::get('inmuebles/windowcard/{id}/{withLogo}', [InmueblesController::class, 'pdf'])->name('inmuebles.generar2');

    Route::get('caracteristicas', [CaracteristicasController::class, 'index'])->name('caracteristicas.index');
    
});

//apiInmueles para que devuelva un json con todos los inmuebles pero que venga con un parametro y dependiendo del parametro, se hace una query diferente

Route::get('api/inmuebles', [InmueblesController::class, 'apiInmueble'])->name('api.inmuebles');



Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
