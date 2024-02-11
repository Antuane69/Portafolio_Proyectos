<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\VacacionesController;
use App\Models\Empleados;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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

Route::get('/dashboard', function(){
    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('auth.login');
    };
})->name('dashboard');

Route::get('/', function () {
    
    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('auth.login');
    };
});

// Empleados

//Route::get('/solicitudes/inicio',[SolicitudVehiculoController::class, 'dashboard'])->name('siveInicio.show');

Route::get('/gestion/mostrarEmpleados',[EmpleadosController::class, 'show'])->name('mostrarEmpleado.show');
Route::get('/gestion/altaEmpleados',[EmpleadosController::class, 'create'])->name('crearEmpleado.create');
Route::post('/gestion/guardarEmpleados',[EmpleadosController::class, 'store'])->name('crearEmpleado.store');
Route::get('/gestion/detallesEmpleados/{id}',[EmpleadosController::class, 'detalles'])->name('detallesEmpleado.show');

Route::get('/gestion/mostrarVacaciones',[VacacionesController::class, 'show'])->name('mostrarVacaciones.show');
Route::get('/gestion/registrarVacaciones',[VacacionesController::class, 'create'])->name('crearVacacion.create');
Route::post('/gestion/guardarVacaciones',[VacacionesController::class, 'store'])->name('crearVacacion.store');
Route::get('/gestion/registrarVacaciones/buscar',[VacacionesController::class, 'search'])->name('crearVacacion.search');