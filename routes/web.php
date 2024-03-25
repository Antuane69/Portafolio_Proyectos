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
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/', function () {
    
    if(Auth::check()){
        return view('dashboard');
    }else{
        return view('auth.login');
    };
})->name('login_2');

Route::middleware(['auth.redirect'])->group( function () {

    // Gestion
    Route::get('/gestion/empleados/inicio',[EmpleadosController::class, 'dashboard'])->name('empleadosInicio.show');
    Route::get('/gestion/mostrarEmpleados',[EmpleadosController::class, 'show'])->name('mostrarEmpleado.show');
    Route::get('/gestion/altaEmpleados',[EmpleadosController::class, 'create'])->name('crearEmpleado.create');
    Route::post('/gestion/guardarEmpleados',[EmpleadosController::class, 'store'])->name('crearEmpleado.store');
    Route::get('/gestion/detallesEmpleados/{id}',[EmpleadosController::class, 'detalles'])->name('detallesEmpleado.show');
    Route::get('/gestion/editarEmpleados/{id}',[EmpleadosController::class, 'edit_show'])->name('editarEmpleado.show');
    Route::post('/gestion/editarEmpleadosVista/{id}',[EmpleadosController::class, 'edit_store'])->name('editarEmpleado.store');
    
    Route::get('/gestion/altaBajasExtra/vista',[BajasController::class, 'createExtraVista'])->name('crearBajas.extraVista');
    Route::post('/gestion/altaBajasExtra',[BajasController::class, 'createExtraStore'])->name('crearBajas.extraStore');
    Route::get('/gestion/altaBajas/{id}',[BajasController::class, 'create'])->name('crearBajas.create');
    Route::post('/gestion/guardarBajas/{id}',[BajasController::class, 'store'])->name('crearBajas.store');
    Route::get('/gestion/mostrarBajas',[BajasController::class, 'show'])->name('mostrarBajas.show');
    Route::get('/gestion/detallesBajas/{id}',[BajasController::class, 'detalles'])->name('detallesBajas.show');
    Route::get('/gestion/restaurarEmpleado/{id}', [BajasController::class, 'restaurar'])->name('restaurarEmpleado');
    
    Route::get('/gestion/mostrarVacaciones',[VacacionesController::class, 'show'])->name('mostrarVacaciones.show');
    Route::get('/gestion/registrarVacaciones',[VacacionesController::class, 'create'])->name('crearVacacion.create');
    Route::post('/gestion/guardarVacaciones',[VacacionesController::class, 'store'])->name('crearVacacion.store');
    Route::get('/gestion/registrarVacaciones/buscar',[VacacionesController::class, 'search'])->name('crearVacacion.search');
    Route::get('/gestion/editarVacaciones/{id}',[VacacionesController::class, 'edit_show'])->name('editarVacacion.show');
    Route::post('/gestion/editarVacacionesVista/{id}',[VacacionesController::class, 'edit_store'])->name('editarVacacion.store');
    Route::delete('/gestion/eliminarVacaciones/{id}', [VacacionesController::class, 'eliminar'])->name('eliminarVacacion');
    
    Route::get('/gestion/mostrarFaltas',[FaltasController::class, 'show'])->name('mostrarFaltas.show');
    Route::get('/gestion/registrarFaltas',[FaltasController::class, 'create'])->name('crearFaltas.create');
    Route::post('/gestion/guardarFaltas',[FaltasController::class, 'store'])->name('crearFaltas.store');
    Route::get('/gestion/registrarFaltas/buscar',[FaltasController::class, 'search'])->name('crearFaltas.search');
    Route::get('/gestion/editarFaltas/{id}',[FaltasController::class, 'edit_show'])->name('editarFaltas.show');
    Route::post('/gestion/editarFaltasVista/{id}',[FaltasController::class, 'edit_store'])->name('editarFaltas.store');
    Route::delete('/gestion/eliminarFaltas/{id}', [FaltasController::class, 'eliminar'])->name('eliminarFaltas');
    Route::get('/gestion/registrarFaltas/buscar/faltas',[FaltasController::class, 'buscarFaltas'])->name('crearFaltas.search_faltas');
    
    Route::get('/gestion/mostrarIncapacidades',[IncapacidadesController::class, 'show'])->name('mostrarIncapacidades.show');
    Route::get('/gestion/registrarIncapacidades',[IncapacidadesController::class, 'create'])->name('crearIncapacidad.create');
    Route::post('/gestion/guardarIncapacidades',[IncapacidadesController::class, 'store'])->name('crearIncapacidad.store');
    Route::get('/gestion/registrarIncapacidades/buscar',[IncapacidadesController::class, 'search'])->name('crearIncapacidad.search');
    Route::get('/gestion/editarIncapacidades/{id}',[IncapacidadesController::class, 'edit_show'])->name('editarIncapacidad.show');
    Route::post('/gestion/editarIncapacidadesVista/{id}',[IncapacidadesController::class, 'edit_store'])->name('editarIncapacidad.store');
    Route::delete('/gestion/eliminarIncapacidades/{id}', [IncapacidadesController::class, 'eliminar'])->name('eliminarIncapacidad');
    
    Route::get('/gestion/mostrarPermisos',[PermisosController::class, 'show'])->name('mostrarPermisos.show');
    Route::get('/gestion/registrarPermisos',[PermisosController::class, 'create'])->name('crearPermisos.create');
    Route::post('/gestion/guardarPermisos',[PermisosController::class, 'store'])->name('crearPermisos.store');
    Route::get('/gestion/registrarPermisos/buscar',[PermisosController::class, 'search'])->name('crearPermisos.search');
    Route::get('/gestion/editarPermisos/{id}',[PermisosController::class, 'edit_show'])->name('editarPermiso.show');
    Route::post('/gestion/editarPermisosVista/{id}',[PermisosController::class, 'edit_store'])->name('editarPermiso.store');
    Route::delete('/gestion/eliminarPermisos/{id}', [PermisosController::class, 'eliminar'])->name('eliminarPermiso');
    
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
    Route::get('/almacen/editarUniformes/{id}',[UniformesController::class, 'edit_show'])->name('editarUniformes.show');
    Route::post('/almacen/editarUniformesVista/{id}',[UniformesController::class, 'edit_store'])->name('editarUniformes.store');
    Route::delete('/almacen/eliminarUniformes/{id}', [UniformesController::class, 'eliminar'])->name('eliminarUniformes');
    
    Route::get('/almacen/mostrar/stockUniformes',[StockUniformesController::class, 'show'])->name('mostrarStock.show');
    Route::get('/almacen/stockUniformes',[StockUniformesController::class, 'create'])->name('crearStockUniformes.create');
    Route::post('/almacen/guardarStockUniformes',[StockUniformesController::class, 'store'])->name('crearStockUniformes.store');
    Route::get('/almacen/editarStockUniformes/{id}',[StockUniformesController::class, 'edit_show'])->name('editarStockUniformes.show');
    Route::post('/almacen/editarStockUniformesVista/{id}',[StockUniformesController::class, 'edit_store'])->name('editarStockUniformes.store');
    Route::delete('/almacen/eliminarStockUniformes/{id}', [StockUniformesController::class, 'eliminar'])->name('eliminarStockUniformes');
    
    Route::get('/almacen/mostrarHerramientas',[HerramientasController::class, 'show'])->name('mostrarHerramientas.show');
    Route::get('/almacen/registrarHerramientas',[HerramientasController::class, 'create'])->name('crearHerramientas.create');
    Route::post('/almacen/guardarHerramientas',[HerramientasController::class, 'store'])->name('crearHerramientas.store');
    Route::get('/almacen/registrarHerramientas/buscar',[HerramientasController::class, 'search'])->name('crearHerramientas.search');
    Route::delete('/almacen/eliminarHerramientas/{id}', [HerramientasController::class, 'eliminar'])->name('eliminarHerramientas');
    Route::get('/almacen/editarHerramientasVista/{id}',[HerramientasController::class, 'edit_show'])->name('editarHerramientas.show');
    Route::post('/almacen/editarHerramientas/{id}',[HerramientasController::class, 'edit_store'])->name('editarHerramientas.store');

    //PDF
    Route::get('/almacen/uniformes/pdf/{id}', [UniformesController::class,'generate_pdf'])->name('uniformes.generarpdf');//*
    Route::post('/almacen/subirUniformes/pdf/{id}', [UniformesController::class,'subir_pdf'])->name('uniformes.subirpdf');//*
    Route::get('/almacen/verUniformes/pdf/{id}', [UniformesController::class,'ver_pdf'])->name('uniformes.verpdf');//*
    Route::get('/almacen/mostrarUniformes/pdf', [UniformesController::class,'mostrar_pdf'])->name('uniformes.mostrarpdf');//*
    Route::delete('/almacen/eliminarUniformesPDF/{id}', [UniformesController::class, 'eliminar_pdf'])->name('eliminarUniformes.pdf');
    
    Route::get('/pdf/inicio',[HerramientasController::class, 'dashboard'])->name('pdfInicio.show');
    Route::get('/almacen/herramientas/pdf/{id}', [HerramientasController::class,'generate_pdf'])->name('herramientas.generarpdf');//*
    Route::post('/almacen/subirHerramientas/pdf/{id}', [HerramientasController::class,'subir_pdf'])->name('herramientas.subirpdf');//*
    Route::get('/almacen/verHerramientas/pdf/{id}', [HerramientasController::class,'ver_pdf'])->name('herramientas.verpdf');//*
    Route::get('/pdf/mostrarHerramientas/pdf', [HerramientasController::class,'mostrar_pdf'])->name('herramientas.mostrarpdf');//*
    Route::delete('/almacen/eliminarHerramientasPDF/{id}', [HerramientasController::class, 'eliminar_pdf'])->name('eliminarHerramientas.pdf');
    
    Route::get('/gestion/datosActa/pdf/{id}', [FaltasController::class,'crear_datosPDF'])->name('faltas.crear_datospdf');//*
    Route::post('/gestion/generarActa/pdf/{id}', [FaltasController::class,'datos_pdf'])->name('faltas.datospdf');//*
    Route::post('/gestion/subirActa/pdf/{id}', [FaltasController::class,'subir_pdf'])->name('faltas.subirpdf');//*
    Route::get('/gestion/verActa/pdf/{id}', [FaltasController::class,'ver_pdf'])->name('faltas.verpdf');//*
    Route::get('/pdf/mostrarActa/pdf', [FaltasController::class,'mostrar_pdf'])->name('faltas.mostrarpdf');//*
    Route::delete('/gestion/eliminarActa/pdf/{id}', [FaltasController::class, 'eliminar_pdf'])->name('eliminarFaltas.pdf');
    
    Route::get('/gestion/verDocumentacion/pdf/{tipo}/{id}', [EmpleadosController::class,'ver_pdf'])->name('empleados.verpdf');//*
    Route::get('/gestion/datosContrato/pdf/{id}', [EmpleadosController::class,'crear_datosPDF'])->name('empleados.crear_datospdf');//*
    Route::post('/gestion/generarContrato/pdf/{id}', [EmpleadosController::class,'datos_pdf'])->name('empleados.datospdf');//*
    Route::post('/gestion/subirContrato/pdf/{id}', [EmpleadosController::class,'subir_pdf'])->name('empleados.subirpdf');//*
    // Route::get('/gestion/verContrato/pdf/{id}', [EmpleadosController::class,'ver_pdf'])->name('empleados.verpdf');//*
    // Route::delete('/gestion/eliminarContrato/pdf/{id}', [EmpleadosController::class, 'eliminar_pdf'])->name('eliminarContrato.pdf');
});
