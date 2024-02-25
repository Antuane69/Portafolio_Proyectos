<?php

use App\Http\Controllers\BajasController;
use App\Models\Empleados;
use App\Models\Incapacidades;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaltasController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\HerramientasController;
use App\Http\Controllers\VacacionesController;
use App\Http\Controllers\IncapacidadesController;
use App\Http\Controllers\PermisosController;
use App\Http\Controllers\StockUniformesController;
use App\Http\Controllers\UniformesController;
use App\Models\Faltas;
use App\Models\Herramientas;

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

// Gestion
Route::get('/gestion/empleados/inicio',[EmpleadosController::class, 'dashboard'])->name('empleadosInicio.show');
Route::get('/gestion/mostrarEmpleados',[EmpleadosController::class, 'show'])->name('mostrarEmpleado.show');
Route::get('/gestion/altaEmpleados',[EmpleadosController::class, 'create'])->name('crearEmpleado.create');
Route::post('/gestion/guardarEmpleados',[EmpleadosController::class, 'store'])->name('crearEmpleado.store');
Route::get('/gestion/detallesEmpleados/{id}',[EmpleadosController::class, 'detalles'])->name('detallesEmpleado.show');

Route::get('/gestion/detallesBajas/{id}',[BajasController::class, 'detalles'])->name('detallesBajas.show');
Route::get('/gestion/mostrarBajas',[BajasController::class, 'show'])->name('mostrarBajas.show');

Route::get('/gestion/mostrarVacaciones',[VacacionesController::class, 'show'])->name('mostrarVacaciones.show');
Route::get('/gestion/registrarVacaciones',[VacacionesController::class, 'create'])->name('crearVacacion.create');
Route::post('/gestion/guardarVacaciones',[VacacionesController::class, 'store'])->name('crearVacacion.store');
Route::get('/gestion/registrarVacaciones/buscar',[VacacionesController::class, 'search'])->name('crearVacacion.search');

Route::get('/gestion/mostrarFaltas',[FaltasController::class, 'show'])->name('mostrarFaltas.show');
Route::get('/gestion/registrarFaltas',[FaltasController::class, 'create'])->name('crearFaltas.create');
Route::post('/gestion/guardarFaltas',[FaltasController::class, 'store'])->name('crearFaltas.store');
Route::get('/gestion/registrarFaltas/buscar',[FaltasController::class, 'search'])->name('crearFaltas.search');

Route::get('/gestion/mostrarIncapacidades',[IncapacidadesController::class, 'show'])->name('mostrarIncapacidades.show');
Route::get('/gestion/registrarIncapacidades',[IncapacidadesController::class, 'create'])->name('crearIncapacidad.create');
Route::post('/gestion/guardarIncapacidades',[IncapacidadesController::class, 'store'])->name('crearIncapacidad.store');
Route::get('/gestion/registrarIncapacidades/buscar',[IncapacidadesController::class, 'search'])->name('crearIncapacidad.search');

Route::get('/gestion/mostrarPermisos',[PermisosController::class, 'show'])->name('mostrarPermisos.show');
Route::get('/gestion/registrarPermisos',[PermisosController::class, 'create'])->name('crearPermisos.create');
Route::post('/gestion/guardarPermisos',[PermisosController::class, 'store'])->name('crearPermisos.store');
Route::get('/gestion/registrarPermisos/buscar',[PermisosController::class, 'search'])->name('crearPermisos.search');

// Almacen
Route::get('/almacen/inicio',[UniformesController::class, 'dashboard'])->name('almacenInicio.show');
Route::get('/almacen/mostrarUniformes',[UniformesController::class, 'show'])->name('mostrarUniformes.show');
Route::get('/almacen/registrarUniformes',[UniformesController::class, 'create'])->name('crearUniformes.create');
Route::post('/almacen/guardarUniformes',[UniformesController::class, 'store'])->name('crearUniformes.store');
Route::get('/almacen/registrarUniformes/buscar',[UniformesController::class, 'search'])->name('crearUniformes.search');
Route::get('/almacen/registrarUniformes/buscar/opciones',[UniformesController::class, 'search_talla'])->name('crearUniformes.search_talla');
Route::get('/almacen/registrarUniformes/buscar/codigo',[UniformesController::class, 'search_codigo'])->name('crearUniformes.search_codigo');
Route::get('/almacen/registrarUniformes/buscar/cantidad',[UniformesController::class, 'search_cantidad'])->name('crearUniformes.search_cantidad');
Route::get('/almacen/registrarUniformes/buscar/total',[UniformesController::class, 'search_total'])->name('crearUniformes.search_total');

Route::get('/almacen/mostrar/stockUniformes',[StockUniformesController::class, 'show'])->name('mostrarStock.show');
Route::get('/almacen/stockUniformes',[StockUniformesController::class, 'create'])->name('crearStockUniformes.create');
Route::post('/almacen/guardarStockUniformes',[StockUniformesController::class, 'store'])->name('crearStockUniformes.store');

Route::get('/almacen/mostrarHerramientas',[HerramientasController::class, 'show'])->name('mostrarHerramientas.show');
Route::get('/almacen/registrarHerramientas',[HerramientasController::class, 'create'])->name('crearHerramientas.create');
Route::post('/almacen/guardarHerramientas',[HerramientasController::class, 'store'])->name('crearHerramientas.store');
Route::get('/almacen/registrarHerramientas/buscar',[HerramientasController::class, 'search'])->name('crearHerramientas.search');

//PDF
Route::get('/almacen/uniformes/pdf/{id}', [UniformesController::class,'generate_pdf'])->name('uniformes.generarpdf');//*
Route::post('/almacen/subirUniformes/pdf/{id}', [UniformesController::class,'subir_pdf'])->name('uniformes.subirpdf');//*
Route::get('/almacen/verUniformes/pdf/{id}', [UniformesController::class,'ver_pdf'])->name('uniformes.verpdf');//*
Route::get('/almacen/mostrarUniformes/pdf', [UniformesController::class,'mostrar_pdf'])->name('uniformes.mostrarpdf');//*

Route::get('/pdf/inicio',[HerramientasController::class, 'dashboard'])->name('pdfInicio.show');
Route::get('/almacen/herramientas/pdf/{id}', [HerramientasController::class,'generate_pdf'])->name('herramientas.generarpdf');//*
Route::post('/almacen/subirHerramientas/pdf/{id}', [HerramientasController::class,'subir_pdf'])->name('herramientas.subirpdf');//*
Route::get('/almacen/verHerramientas/pdf/{id}', [HerramientasController::class,'ver_pdf'])->name('herramientas.verpdf');//*
Route::get('/pdf/mostrarHerramientas/pdf', [HerramientasController::class,'mostrar_pdf'])->name('herramientas.mostrarpdf');//*

Route::get('/gestion/datosActa/pdf/{curp}', [FaltasController::class,'crear_datosPDF'])->name('faltas.crear_datospdf');//*
Route::post('/gestion/generarActa/pdf/{curp}', [FaltasController::class,'datos_pdf'])->name('faltas.datospdf');//*
Route::post('/gestion/subirActa/pdf/{id}', [FaltasController::class,'subir_pdf'])->name('faltas.subirpdf');//*
Route::get('/gestion/verActa/pdf/{id}', [FaltasController::class,'ver_pdf'])->name('faltas.verpdf');//*
Route::get('/pdf/mostrarActa/pdf', [FaltasController::class,'mostrar_pdf'])->name('faltas.mostrarpdf');//*