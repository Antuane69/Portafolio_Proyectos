<?php

use App\Models\User;
use App\Models\Vehiculo;
use App\Models\Datosuser;
use App\Models\siniestros;
use App\Models\Notificacion;
use FontLib\Table\Type\name;
use App\Exports\VacationDays;
use App\Models\SolicitudVehiculo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Vehiculos;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Models\SolicitudMantenimiento;
// use App\Http\Controllers\SivaController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RijController;
use App\Http\Controllers\BajaController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SIVEController;
use App\Http\Controllers\UserController;
use App\Models\FormatoRecepcionVehiculo;
use App\Http\Controllers\CovidController;
use App\Http\Controllers\MermaController;
use App\Http\Controllers\SSBDXController;
use App\Http\Controllers\AlmacenController;
use App\Http\Controllers\MiSaludController;
use App\Http\Controllers\SoporteController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DatosuserController;
use App\Http\Controllers\EvidenciaController;
use App\Http\Controllers\VehiculosController;
use App\Http\Controllers\FormularioController;
// use App\Http\Controllers\ResguardosController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PersonalesController;
use App\Http\Controllers\ResguardosController;
use App\Http\Controllers\siniestrosController;
use App\Http\Controllers\CombustibleController;
use App\Http\Controllers\Evaluacion5Controller;
use App\Http\Controllers\ReportesEv5Controller;
use App\Http\Controllers\ReportesRijController;
use App\Http\Controllers\ConfirmacionController;
use App\Http\Controllers\Dia_feriadosController;
use App\Http\Controllers\GinecologicosController;
use App\Http\Controllers\MantenimientoController;
use App\Http\Controllers\ReportesSaludController;
use App\Http\Controllers\VacacionesFueraController;
use App\Http\Controllers\SolicitudVehiculoController;
use App\Http\Controllers\Cursos_ProgramadosController;
use App\Http\Controllers\Dia_vac_disponiblesController;
use App\Http\Controllers\pagosAdministrativosController;
use App\Http\Controllers\Solicitudes_vacacionesController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Http\Controllers\FormatoRecepcionVehiculoController;

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
    $areaJefe = Datosuser::where('rpe',auth()->user()->rpe)->first();

    if(Auth::check()){
        $totalvehi = Vehiculo::query()->count();
        $totalprest = Vehiculo::query()->where('rpe','!=','')->where('Zona',$areaJefe->area)->count();

        // $vehiculos = Vehiculo::all();
        // foreach($vehiculos as $vehi){
        //     $totalmant = SolicitudMantenimiento::where('economico',$vehi->Economico)->where('')->count();
        // }

        $totalmant = SolicitudMantenimiento::query()->count();
        $totalrob = siniestros::query()->count();

        return view('dashboard',[
            'totalvehi' => $totalvehi,
            'totalprest' => $totalprest,
            'totalmant' => $totalmant,
            'totalrob' => $totalrob
        ]);
    }else{
        return view('auth.login');
    };
})->name('dashboard');

Route::get('/', function () {
    
    if(Auth::check()){
        $areaJefe = Datosuser::where('rpe',auth()->user()->rpe)->first();
        $totalvehi = Vehiculo::query()->count();
        $totalprest = Vehiculo::query()->where('rpe','!=','')->where('Zona',$areaJefe->area)->count();
        $totalmant = SolicitudMantenimiento::query()->count();
        $totalrob = siniestros::query()->count();

        return view('dashboard',[
            'totalvehi' => $totalvehi,
            'totalprest' => $totalprest,
            'totalmant' => $totalmant,
            'totalrob' => $totalrob
        ]);
    }else{
        return view('auth.login');
    };
});

Route::get('/combustibles/inicio', [CombustibleController::class, 'dashboard'])->name('combustibles.inicio');
Route::get('/combustibles/created', [CombustibleController::class, 'created'])->name('combustibles.crear');
Route::post('/combustibles/store', [CombustibleController::class, 'store'])->name('combustibles.store');
Route::get('/combustibles/show', [CombustibleController::class, 'show'])->name('combustibles.show');
Route::post('/filtroCombustibles', [CombustibleController::class, 'filtroCombustibles']);
Route::get('/combustibles/show/Gasto/Mensual', [CombustibleController::class, 'showGastoMensual'])->name('combustibles.show.GastoMensual');
Route::get('/combustibles/show/view/{id}', [CombustibleController::class, 'showpdf'])->name('combustibles.show.view');
Route::get('/combustibles/Graficas', [CombustibleController::class, 'graficasDashboard'])->name('combustibles.graficas.dashboard');
Route::get('/combustibles/rendimiento', [CombustibleController::class, 'rendimientoCombustible'])->name('combustibleRendimiento.show');
Route::post('/filtroEconomico', [CombustibleController::class, 'filtroEconomico']);
Route::post('/filtroRendimiento', [CombustibleController::class, 'filtroRendimiento']);
Route::get('/combustibles/crearregistro/buscar',[CombustibleController::class, 'search'])->name('crearcombustible.search');
Route::post('/combustibles/crearregistro/buscarvehiculo',[CombustibleController::class, 'searchvehiculo'])->name('crearcombustible.searchvehiculo');
Route::post('/filtrarGastosPorZona', [CombustibleController::class, 'filtrarGastosPorZona']);
Route::get('/combustibles/edit/{id}', [CombustibleController::class, 'edit'])->name('combustibles.edit');
Route::put('/combustibles/update/{id}', [CombustibleController::class, 'update'])->name('combustibles.update');
Route::delete('/combustibles/eliminar/{id}', [CombustibleController::class, 'destroy'])->name('combustibles.destroy');
Route::get('/siniestros/inicio', [siniestrosController::class, 'dashboard'])->name('siniestros.inicio');
Route::get('/siniestros/created', [siniestrosController::class, 'created'])->name('siniestros.crear');
Route::post('/siniestros/store', [siniestrosController::class, 'store'])->name('siniestros.store');
Route::get('/siniestros/show', [siniestrosController::class, 'show'])->name('siniestros.show');
Route::get('/siniestros/show/view/{id}', [siniestrosController::class, 'showpdf'])->name('siniestros.show.view');
Route::post('/filtroSiniestros', [siniestrosController::class, 'filtroSiniestros']);
Route::get('/siniestros/edit/{id}', [siniestrosController::class, 'edit'])->name('siniestros.edit');
Route::put('/siniestros/update/{id}', [siniestrosController::class, 'update'])->name('siniestros.update');
Route::delete('/siniestros/eliminar/{id}', [siniestrosController::class, 'destroy'])->name('siniestros.destroy');
Route::post('/filtroRendimiento', [CombustibleController::class, 'filtroRendimiento']);
Route::get('/siniestros/crearregistro/buscar',[siniestrosController::class, 'search'])->name('crearSiniestro.search');
Route::post('/siniestros/crearregistro/buscarvehiculo',[siniestrosController::class, 'searchvehiculo'])->name('crearSiniestro.searchvehiculo');
Route::post('/siniestros/subirpdf/{id}', [siniestrosController::class,'subirPDF'])->name('siniestropdf.subir');//*
Route::get('/siniestros/verpdf/{id}', [siniestrosController::class,'verPDF'])->name('siniestropdf.ver');//*

Route::post('/cargaIndicadoresExcel', [\App\Http\Controllers\SSBDXController::class, 'uploadIndicadoresExcel'])->name('indicadores.uploadIndicadoresExcel');
Route::post('/cargaZonaIndicadoresExcel', [\App\Http\Controllers\SSBDXController::class, 'uploadZonaIndicadoresExcel'])->name('indicadores.uploadZonaIndicadoresExcel');

Route::get('/combustibles/gastoVehicular', [CombustibleController::class, 'gastoVehiculo'])->name('combustibles.gastoVehiculo');
Route::post('/combustibles/contarGasto', [CombustibleController::class, 'obtenerGasto'])->name('combustibles.contarGasto');

Route::get('/indicadores/index', [App\Http\Controllers\SSBDXController::class, 'index'])->name('indicadores.index');
Route::get('/indicadores/select/{area}', [App\Http\Controllers\SSBDXController::class, 'indexSelect'])->name('indicadores.select');
Route::get('/indicadores/rating', [App\Http\Controllers\SSBDXController::class, 'rating'])->name('indicadores.rating');
Route::get('/indicadores/indicadoresArea/{zone}', [App\Http\Controllers\SSBDXController::class, 'indicadoresArea'])->name('indicadores.indicadoresArea');
Route::get('/getProfitByIndicator', [\App\Http\Controllers\SSBDXController::class, 'profitByIndicator'])->name('indicadores.profitByIndicator');

Route::post('/indicadores/cambiar-indicadores', [SSBDXController::class, 'changeIndicator']);
Route::get('/indicadores/getIndicatorSwitchs', [SSBDXController::class, 'getIndicatorSwitchs']);

Route::get('/shwitchIndicador',[SSBDXController::class, 'shitch'])->name('indicadores.switch');

Route::get('/getIndicatorStatistics', [\App\Http\Controllers\SSBDXController::class, 'getIndicatorStatistics']);
Route::post('/getIndicatorStatisticsByZone', [\App\Http\Controllers\SSBDXController::class, 'getIndicatorStatisticsByZone']);
Route::get('/csrf-token',function (){
    $token = csrf_token();
    return response()->json(['token' => $token]);
});


//Route::get('/indicadores/areas', [App\Http\Controllers\SSBDXController::class, 'areas'])->name('indicadores.areas');//0
//Route::get('/generalRating', [\App\Http\Controllers\SSBDXController::class, 'getGeneralRating']);//ya no existe la funcion (rating)
//Route::get('/profitByZone', [\App\Http\Controllers\SSBDXController::class, 'profitByZone']);//ya no existe la funcion ()
//Route::get('/getPerspectives', [\App\Http\Controllers\SSBDXController::class, 'getPerspectives']);//ya no existe la funcion ()
Route::get('/getNotificationsExcel', [\App\Http\Controllers\NotificacionesController::class, 'exportNotificationsExcel']);

Route::post('/subarea', [App\Http\Controllers\RijController::class, 'subcategorias']);
Route::get('/users/datosPersonales', [App\Http\Controllers\UserController::class, 'datosPersonales'])->name('users.datosPersonales');
Route::get('/users/usuariosBaja', [App\Http\Controllers\UserController::class, 'usuariosBaja'])->name('users.usuariosBaja');
Route::get('/users/centros', [App\Http\Controllers\UserController::class, 'centros'])->name('users.centros');
Route::get('productos/inventario', [App\Http\Controllers\ProductoController::class,'indexI'])->name('productos.indexI');
Route::get('productos/inventarioSubareas', [App\Http\Controllers\ProductoController::class,'indexSubareas'])->name('productos.indexSubareas');
Route::get('productos/inventarioGeneral', [App\Http\Controllers\ProductoController::class,'indexTotal'])->name('productos.indexTotal');
Route::get('productos/inventario/edit/{producto}', [App\Http\Controllers\ProductoController::class,'editI'])->name('productos.editI');
Route::patch('productos/inventario/edit/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'update'])->name('productos.update');
Route::patch('productos/inventario/edit/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'updateI'])->name('productos.updateAgregarExistencias');
Route::get('productos/inventario/eliminar/', [App\Http\Controllers\ProductoController::class,'eliminarExistenciasIndex'])->name('productos.eliminarExistenciasIndex');
Route::get('productos/inventario/eliminar/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'eliminarExistenciasProducto'])->name('productos.eliminarExistenciasProducto');
Route::patch('productos/inventario/actualizar/producto/{producto}', [App\Http\Controllers\ProductoController::class, 'actualizarExistencias'])->name('productos.actualizarExistencias');
Route::post('/recargarCategorias', [App\Http\Controllers\ProductoController::class, 'updateTable']);
Route::post('/filtroInventarioGeneral', [App\Http\Controllers\ProductoController::class, 'filtroInventarioGeneral']);
Route::post('/filtroQuitarExistencias', [App\Http\Controllers\ProductoController::class, 'filtroQuitarExistencias']);
    
Route::get('/solicitudes/inicio',[SolicitudVehiculoController::class, 'dashboard'])->name('siveInicio.show');
Route::get('/mostraralmacen',[VehiculosController::class, 'show'])->name('mostrarvehiculos.show');
Route::post('/filtroVehiculos', [VehiculosController::class, 'filtroVehiculos']);
Route::get('/solicitudes/mostrardetalles/{id}',[SolicitudVehiculoController::class, 'showDetallesSolicitud'])->name('mostrardetalles.show');
Route::get('/solicitudes/mostrarsolicitudes',[SolicitudVehiculoController::class, 'show'])->name('mostrarsolicitudes.show');
Route::get('/solicitudes/crearsolicitudes/buscar',[SolicitudVehiculoController::class, 'search'])->name('crearsolicitud.search');
Route::get('/solicitudes/crearsolicitudes/buscarvehiculo',[SolicitudVehiculoController::class, 'searchvehiculo'])->name('searchvehiculo');
Route::get('/solicitudes/crearsolicitudes',[SolicitudVehiculoController::class, 'create'])->name('crearsolicitud.create');
Route::post('/solicitudes/storesolicitudes',[SolicitudVehiculoController::class, 'store'])->name('crearsolicitud.store');
Route::get('/solicitudes/historico',[SolicitudVehiculoController::class, 'historicoSolicitudes'])->name('historicoSolicitudes.show');
Route::post('/filtroHistorico', [SolicitudVehiculoController::class, 'filtroHistorico']);
Route::post('/solicitudes/aceptarsolicitudes/{id}',[SolicitudVehiculoController::class, 'accept'])->name('aceptarsolicitud.accept');
Route::post('/solicitudes/rechazarsolicitudes/{id}',[SolicitudVehiculoController::class, 'reject'])->name('rechazarsolicitud.reject');
Route::get('/solicitudes/crearformulario',[FormularioController::class, 'create'])->name('crearformulario.create');
Route::post('/solicitudes/storeformulario',[FormularioController::class, 'store'])->name('crearformulario.store');
Route::get('/solicitudes/formulario',[FormularioController::class, 'show'])->name('mostrarformulario.show');
Route::get('/solicitudes/mostrarformato/{solicitud_id}',[FormatoRecepcionVehiculoController::class, 'show'])->name('mostrarformato.show');
Route::get('/solicitudes/crearformato/{id}',[FormatoRecepcionVehiculoController::class, 'create'])->name('crearformato.create');
Route::post('/solicitudes/storeformato/{id}',[FormatoRecepcionVehiculoController::class, 'store'])->name('crearformato.store');
Route::get('/solicitudes/crearformato/buscar',[FormatoRecepcionVehiculoController::class, 'search'])->name('crearformato.search');
Route::post('/solicitudes/crearformato/buscarvehiculo',[FormatoRecepcionVehiculoController::class, 'searchvehiculo'])->name('searchvehiculoformato');
Route::get('/solicitudes/editar-formato/{id}',[FormatoRecepcionVehiculoController::class, 'edit'])->name('formato.edit');
Route::post('/solicitudes/editar-formato-vista/{id}',[FormatoRecepcionVehiculoController::class, 'edit_show'])->name('formato.editshow');
Route::get('/solicitudes/editar-solicitud/{id}',[SolicitudVehiculoController::class, 'edit'])->name('solicitud.edit');
Route::post('/solicitudes/editar-solicitud-vista/{id}',[SolicitudVehiculoController::class, 'edit_show'])->name('solicitud.editshow');
Route::delete('/solicitudes/eliminar/{id}', [SolicitudVehiculoController::class, 'eliminar'])->name('solicitud.eliminar');
Route::delete('/solicitudes/finalizada/eliminar/{id}', [SolicitudVehiculoController::class, 'Finalizada_Eliminar'])->name('solicitudFinalizada.eliminar');
Route::delete('/solicitudes/formato/eliminar/{id}', [FormatoRecepcionVehiculoController::class, 'eliminar'])->name('formato.eliminar');

Route::post('/solicitudes/solicitud/pdf/{id}', [FormatoRecepcionVehiculoController::class,'solicitudPDF'])->name('formato.solicitudpdf');//*
Route::post('/solicitudes/entrega/pdf/{id}', [FormatoRecepcionVehiculoController::class,'entregaPDF'])->name('formato.entregapdf');//*
Route::get('/solicitudes/formato/verpdf/{aux}/{id}', [FormatoRecepcionVehiculoController::class,'showPDF'])->name('formato.showpdf');//*
Route::get('/solicitudes/formato/pdf/{id}', [FormatoRecepcionVehiculoController::class,'generatepdf'])->name('formato.generarpdf');//*

Route::get('/descargar-imagenCombustible/{nombre}', function ($nombre) {
    $ruta = public_path("img/SIVE/combustibles/{$nombre}");

    if (file_exists($ruta)) {
        return response()->download($ruta, $nombre);
    } else {
        abort(404); // Devuelve una respuesta 404 si el archivo no existe
    }
})->where('nombre', '.*');
Route::get('/descargar-imagenSiniestro/{nombre}', function ($nombre) {
    $ruta = public_path("img/SIVE/siniestros/{$nombre}");
    if (file_exists($ruta)) {
        return response()->download($ruta, $nombre);
    } else {
        abort(404); // Devuelve una respuesta 404 si el archivo no existe
    }
})->where('nombre', '.*');

Route::get('/mantenimiento', [MantenimientoController::class, 'inicio'])->name('inicioMantenimiento.show');
Route::get('/mantenimiento/solicitud', [MantenimientoController::class, 'solicitarMantenimiento'])->name('solicitarMantenimiento.show');
Route::post('/mantenimiento/enviarSolicitud', [MantenimientoController::class,'create'])->name('crearMantenimiento.create');
Route::get('/mantenimiento/historico', [MantenimientoController::class,'historicoSolicitudes'])->name('historicoSolicitudesM.show');
Route::get('/mantenimiento/mostrarsolicitudesM',[MantenimientoController::class, 'show'])->name('mostrarSolicitudesM.show');
Route::post('/mantenimiento/aceptarsolicitudesM/{id}',[MantenimientoController::class, 'accept'])->name('aceptarsolicitudM.accept');
Route::post('/mantenimiento/rechazarsolicitudesM/{id}',[MantenimientoController::class, 'reject'])->name('rechazarsolicitudM.reject');
Route::get('/mantenimiento/actualizarSolicitud/{id}', [MantenimientoController::class, 'edit'])->name('editarMantenimiento.edit');
Route::put('/mantenimiento/enviarNuevaSolicitud/{id}', [MantenimientoController::class, 'update'])->name('actualizarMantenimiento.update');
Route::get('/mantenimiento/crearSolicitudesM/buscarRPE',[MantenimientoController::class, 'buscarRPE'])->name('crearsolicitudM.search');
Route::get('/mantenimiento/crearSolicitudesM/buscarEconomico',[MantenimientoController::class, 'buscarEconomico'])->name('buscarEconomico.search');
Route::post('/mantenimiento/finalizarMantenimiento/{id}', [MantenimientoController::class, 'finalizar'])->name('finalizarMantenimiento.edit');
Route::post('/filtroEconomicos', [MantenimientoController::class, 'filtroEconomicos']);
Route::delete('/mantenimiento/eliminar/{id}', [MantenimientoController::class, 'delete'])->name('eliminarMantenimiento.delete');


Route::get('/pagosAdministrativos/crear',[pagosAdministrativosController::class, 'pagos'])->name('pagosAdministrativos.crear');
Route::get('/pagosAdministrativos/inicio',[pagosAdministrativosController::class, 'index'])->name('pagosAdministrativos.inicio');
Route::post('/pagosAdministrativos/guardar',[pagosAdministrativosController::class, 'store'])->name('pagosAdministrativos.guardar');
Route::get('/pagosAdministrativos/mostrarSolicitudes',[pagosAdministrativosController::class, 'solicitudes'])->name('pagosAdministrativos.mostrarSolicitudes');
Route::get('/pagosAdministrativos/solicitudesPendientes',[pagosAdministrativosController::class, 'solicitudesPendientes'])->name('pagosAdministrativos.solicitudesPendientes');
Route::post('/pagosAdministrativos/pagosSolicitados',[pagosAdministrativosController::class, 'pagosSolicitados'])->name('pagosAdministrativos.pagosSolicitados');
Route::get('/pagosAdministrativos/mostrarArchivoSolicitud/{nombreDocumento}',[pagosAdministrativosController::class, 'mostrarDocumento'])->name('pagosAdministrativos.mostrarDocumento');
Route::post('/pagosAdministrativos/aceptarSolicitud',[pagosAdministrativosController::class, 'aceptarSolicitud'])->name('pagosAdministrativos.aceptarSolicitud');
Route::put('/pagosAdministrativos/rechazarSolicitud/{idSolicitud}',[pagosAdministrativosController::class, 'rechazarSolicitud'])->name('pagosAdministrativos.rechazarSolicitud');
Route::post('/pagosAdministrativos/vehiculosRPE', [pagosAdministrativosController::class, 'vehiculosRPE'])->name('pagosAdministrativos.vehiculosRPE');
Route::post('/pagosAdministrativos/cambiarPago', [pagosAdministrativosController::class, 'cambiarPago'])->name('pagosAdministrativos.cambiarPago');
Route::post('/pagosAdministrativos/cambiar', [pagosAdministrativosController::class, 'cambiar'])->name('pagosAdministrativos.cambiar');
Route::post('/pagosAdministrativos/eliminarPago', [pagosAdministrativosController::class, 'eliminarPago'])->name('pagosAdministrativos.eliminarPago');
Route::post('/solicitudes/crearsolicitudes/buscarEconomicoRPE',[CombustibleController::class, 'economicoPorRPE'])->name('buscarEconomicoRPE');

Route::get('/profile', 'App\Http\Controllers\UserController@profile')->name('user.profile');
Route::patch('/profile', 'App\Http\Controllers\UserController@update_profile')->name('user.profile.update');
Route::get('/datosuserexcel', [App\Http\Controllers\DatosuserController::class, 'datosuserexcel']);
Route::get('/rijexcel', [App\Http\Controllers\RijController::class, 'rijfromfile']);
Route::get('/ev5excel', [App\Http\Controllers\Evaluacion5Controller::class, 'ev5excel']);
Route::get('/ev5/index', [App\Http\Controllers\Evaluacion5Controller::class, 'index'])->name('evaluacion5s.index');
Route::get('/ev5/eliminar/{eval5s}', [App\Http\Controllers\Evaluacion5Controller::class,'delete'])->name('evaluacion5s.delete');//*
Route::get('/inventarios/index', [App\Http\Controllers\InventarioController::class, 'index'])->name('inventarios.index');
Route::get('/inventarios/general', [App\Http\Controllers\InventarioController::class, 'inventarioGeneral'])->name('inventarios.inventarioGeneral');
Route::get('/inventarios/autorizarindex', [App\Http\Controllers\InventarioController::class, 'autorizarIndex'])->name('inventarios.autorizar');
Route::get('/inventarios/entregarindex', [App\Http\Controllers\InventarioController::class, 'entregarIndex'])->name('inventarios.entregar');
Route::get('/inventarios/entregadosindex', [App\Http\Controllers\InventarioController::class, 'entregadosIndex'])->name('inventarios.entregados');
Route::get('/inventarios/autorizarproductos/{inventario}', [App\Http\Controllers\InventarioController::class, 'autorizarProductos'])->name('inventarios.autorizarProductos');
Route::get('/inventarios/pedidoespecial', [App\Http\Controllers\InventarioController::class, 'pedidoespecial'])->name('inventarios.pedidoespecial');
Route::post('/inventarios/pedidoespecial', [App\Http\Controllers\InventarioController::class, 'especial_store'])->name('inventarios.especial_store');
Route::get('/inventarios/pedidoespecial/autorizar', [App\Http\Controllers\InventarioController::class, 'indexPedidoEspecial'])->name('inventarios.indexPedidoEspecial');
Route::get('/inventarios/pedidoespecial/autorizar/{id}', [App\Http\Controllers\InventarioController::class, 'authPedidoEspecial'])->name('inventarios.authPedidoEspecial');
Route::get('/inventarios/pedidoespecial/create/{pedido}/{auth}', [App\Http\Controllers\InventarioController::class, 'createpedidoespecial'])->name('inventarios.createpedidoespecial');
Route::get('/inventarios/changeinventariostatus/{inventario}/{status}', [App\Http\Controllers\InventarioController::class, 'changeInventarioStatus'])->name('inventarios.changeInventarioStatus');
Route::get('/inventarios/changeproductstatus/{inventario}/{status}/{id}', [App\Http\Controllers\InventarioController::class, 'changeProductStatus'])->name('inventarios.changeProductStatus');
Route::get('/inventarios/comentario/{inventario}/{id}', [App\Http\Controllers\InventarioController::class, 'comentario'])->name('inventarios.comentario');
Route::get('/inventarios/reponer/', [App\Http\Controllers\InventarioController::class, 'reponer'])->name('inventarios.reponer');
Route::get('/inventarios/proximosAgotar/', [App\Http\Controllers\InventarioController::class, 'proximosAgotar'])->name('inventarios.proximosAgotar');
//Resguardo ver
Route::get('resguardos/consultar', [App\Http\Controllers\ResguardosController::class,'index'])->name('resguardos.index');//*
Route::get('resguardos/consultar/rpe', [App\Http\Controllers\ResguardosController::class,'indexRPE'])->name('resguardos.index.rpe');//*
Route::get('resguardos/consultar/view/{resguardo}', [App\Http\Controllers\ResguardosController::class,'verindex'])->name('resguardos.ver');//*
Route::get('resguardos/consultar/view/download/{file}', [App\Http\Controllers\ResguardosController::class,'showpdf'])->name('resguardos.ver.mostrarpdf');//*
Route::get('resguardos/consultar/view/{file}/download', [App\Http\Controllers\ResguardosController::class,'download'])->name('resguardos.ver.descargar');
Route::get('resguardos/consulta/pdf/{resguardo}', [App\Http\Controllers\ResguardosController::class,'generatepdf'])->name('resguardos.ver.generarpdf');//*
Route::get('resguardos/subresguardo/{resguardo}', [App\Http\Controllers\ResguardosController::class,'generarhijo'])->name('resguardos.generarhijo');//*
Route::post('resguardos/subresguardo', [App\Http\Controllers\ResguardosController::class,'storehijo'])->name('resguardos.storehijo');//*
Route::get('resguardos/cecos', [App\Http\Controllers\ResguardosController::class,'cecos'])->name('resguardos.cecos');
//Resguardo Acciones
Route::get('resguardos/consultar/modificar/{resguardo}', [App\Http\Controllers\ResguardosController::class,'modificar'])->name('resguardos.modificar');//*
Route::get('resguardos/consultar/eliminar/{resguardo}', [App\Http\Controllers\ResguardosController::class,'delete'])->name('resguardos.delete');//*
//Resguardo Status
Route::get('resguardos/consultar/asignar/pendientes', [App\Http\Controllers\ResguardosController::class,'indexPendientes'])->name('resguardos.status.index.pendientes');//*
Route::get('resguardos/consultar/asignar', [App\Http\Controllers\ResguardosController::class,'indexAsignar'])->name('resguardos.status.index');//*
Route::get('resguardos/consultar/asignar/{resguardo}', [App\Http\Controllers\ResguardosController::class,'asignarStatus'])->name('resguardos.status.asignar');//*
Route::put('resguardos/consultar/asignar/{resguardo}/update', [App\Http\Controllers\ResguardosController::class,'statusUpdate'])->name('resguardos.status.save');//*
Route::get('resguardos/consultar/asignar/{resguardo}/revertir', [App\Http\Controllers\ResguardosController::class,'revertirStatus'])->name('resguardos.status.revertir');//*
Route::get('resguardos/consultar/asignar/{resguardo}/bitacora', [App\Http\Controllers\ResguardosController::class,'bitacoraStatus'])->name('resguardos.status.bitacora');//*
//
Route::get('resguardos/index/status', [App\Http\Controllers\ResguardosController::class,'indexStatus'])->name('resguardos.status');//*
Route::get('resguardos/index/sap', [App\Http\Controllers\ResguardosController::class,'indexSAP'])->name('resguardos.saps');//*
Route::post('resguardos/delete/sap/{sap}', [App\Http\Controllers\ResguardosController::class,'deleteSAP'])->name('resguardos.deletesap');//*

Route::get('resguardos/edit/{registro}', [App\Http\Controllers\ResguardosController::class,'editI'])->name('resguardos.editI');
Route::patch('resguardos/edit/registro/{registro}', [App\Http\Controllers\ResguardosController::class, 'updateI'])->name('resguardos.updateI');

Route::get('resguardos/bitacora', [App\Http\Controllers\ResguardosController::class,'bitacora'])->name('resguardos.bitacora');//*
Route::get('resguardos/reporte', [App\Http\Controllers\ResguardosController::class,'reporte'])->name('resguardos.reporte');//*

// Route::get('/solicitars/reporte', function () { return Excel::download(new VacationDays, 'vacaciones_solicitadas.xlsx');})->name('solicitars.reporte');
// Route::get('/solicitars/reportes', [App\Http\Controllers\Solicitudes_vacacionesController::class,'reportes'])->name('solicitars.reportes');
// Route::post('/filtrarVacaciones', [App\Http\Controllers\Solicitudes_vacacionesController::class, 'filterReportes'])->name('solicitars.filterRep');

Route::get('/saluds/expedientes/{id}',[App\Http\Controllers\MiSaludController::class,'indice'])->name('saluds.indice');
Route::get('/saluds/reportes',[App\Http\Controllers\ReportesSaludController::class,'show'])->name('reportesSalud.show');

Route::post('/subarea', [App\Http\Controllers\RijController::class, 'subcategorias']);
Route::get('evidencias/mostrar', [App\Http\Controllers\EvidenciaController::class,'index'])->name('evidencias.index');
Route::get('evidencias/tablero', [App\Http\Controllers\EvidenciaController::class,'tableroView'])->name('evidencias.tablero');

Route::get('buscar-user/{usuario}', [App\Http\Controllers\DatosuserController::class, 'buscarUsuario']);

Route::get('/get-subarea', function () {
    return Auth::user()->datos->subarea;
});

Route::middleware(['auth:sanctum', 'verified', 'datos.completos'])->group( function () {
    Route::post('/user/bajar', [UserController::class, 'bajar'])->name('users.bajar');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');
    Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/destroy', [CartController::class, 'destroy'])->name('cart.destroy');
    Route::resource('evidencias', EvidenciaController::class);
    Route::resource('rijs', RijController::class);
    Route::resource('users', UserController::class);
    Route::resource('resguardos', ResguardosController::class);//*
    Route::resource('reportesRij', ReportesRijController::class);
    Route::resource('roles', RoleController::class)->names('roles');
    Route::resource('reportesEv5', ReportesEv5Controller::class);
    Route::resource('calendario', CalendarController::class);
    Route::resource('evaluacion5s', Evaluacion5Controller::class);
    Route::resource('soportes', SoporteController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('categorias', CategoriaController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('cursos', Cursos_ProgramadosController::class);
    Route::resource('feriados', Dia_feriadosController::class);
    Route::resource('disponibles', Dia_vac_disponiblesController::class);
    // Route::resource('solicitars', Solicitudes_vacacionesController::class);
    // Route::resource('solicitarfuera', VacacionesFueraController::class);
    Route::resource('cursos', Cursos_ProgramadosController::class);
    // Route::resource('sivas', SivaController::class);
    Route::resource('saluds', MiSaludController::class);
    Route::resource('covids', CovidController::class);
    Route::resource('datos', DatosuserController::class)->except(['create', 'edit', 'update']);
    Route::resource('ginecologicos', GinecologicosController::class);
    Route::resource('bajas', BajaController::class);
    Route::get('/merma/añadir/{producto}', [MermaController::class, 'anadirMermas'])->name('mermas.anadirMermas');
    Route::post('/mermas/actualizar', [MermaController::class, 'autorizarMermas'])->name('mermas.autorizarMermas');
    Route::get('mermas/historial/',[MermaController::class, 'indexHistorial'])->name('mermas.indexHistorial');
    Route::post('/storeMerma', [App\Http\Controllers\MermaController::class, 'store']);
    Route::resource('mermas', MermaController::class);
    Route::resource('almacenes', AlmacenController::class);
    Route::get('personales/{rpe}', [App\Http\Controllers\PersonalesController::class, 'indice'])->name('personales.indice');
    Route::get('personales/{rpe}/create', [App\Http\Controllers\PersonalesController::class, 'create'])->name('personales.create');
    Route::post('personales/{rpe}', [App\Http\Controllers\PersonalesController::class, 'store'])->name('personales.store');
    Route::patch('personales/{id}/edit', [App\Http\Controllers\PersonalesController::class, 'update'])->name('personales.update');
    Route::delete('personales/{rpe}/{id}', [App\Http\Controllers\PersonalesController::class, 'destroy'])->name('personales.destroy');
    Route::resource('personales', PersonalesController::class)->except(['create', 'store', 'destroy']);

    Route::post('/filtrarUsuarios', [App\Http\Controllers\UserController::class, 'filterUsers'])->name('users.filterUsers');
    Route::post('/filtrarProductos', [App\Http\Controllers\ProductoController::class, 'generalStockFilter']);
    Route::post('/almacenesSelect', [App\Http\Controllers\ProductoController::class, 'almacenes']);
    Route::post('/ubicacionSelect', [App\Http\Controllers\ProductoController::class, 'ubicacionInvGen']);

    // Route::post('/filtrarVacacionesFuera', [App\Http\Controllers\VacacionesFueraController::class, 'filterVacations'])->name('solicitarfuera.filterVacations');


    Route::post('/areas', [App\Http\Controllers\RijController::class, 'areas']);
    Route::post('/datasetchart', [App\Http\Controllers\ReportesRijController::class, 'dataSetChart']);
    Route::post('/datasetarea', [App\Http\Controllers\ReportesRijController::class, 'reportesTabla']);
    Route::post('/datasetchartEv5', [App\Http\Controllers\ReportesEv5Controller::class, 'dataSetChartEv5']);
    Route::post('/datasetareaEv5', [App\Http\Controllers\ReportesEv5Controller::class, 'reportesTablaEv5']);
    Route::post('/fullcalenderajax', [App\Http\Controllers\CalendarController::class, 'ajax']);
    Route::post('/documentos', [App\Http\Controllers\EvidenciaController::class, 'documentos']);
    
    Route::post('/actualizar', [App\Http\Controllers\EvidenciaController::class, 'updateTable']);
    Route::post('/recargarCategorias', [App\Http\Controllers\ProductoController::class, 'updateTable']);
    Route::post('/actualizar', [App\Http\Controllers\InventarioController::class, 'updateTable']);
    Route::post('/areas', [App\Http\Controllers\UserController::class,'areas']);
    Route::post('/subareas', [App\Http\Controllers\UserController::class,'subareas']);

    Route::post('/documento_validar', [App\Http\Controllers\EvidenciaController::class, 'documento_validar']);
    Route::get('/download/{file}', 'App\Http\Controllers\EvidenciaController@download');
    #Route::post('/store', [App\Http\Controllers\EvidenciaController::class, 'store'])->name('evidencias.store');
    Route::get('/autorizar/{id}', 'App\Http\Controllers\EvidenciaController@autorizar');
    Route::get('/rechazar/{id}', 'App\Http\Controllers\EvidenciaController@rechazar');
    Route::get('/corregir/{id}', 'App\Http\Controllers\EvidenciaController@corregir');
    Route::get('evidencias/revisar/{id}', [App\Http\Controllers\EvidenciaController::class,'edit'])->name('evidencias.revisar');
    Route::get('evidencias/mostrar/reportes', [App\Http\Controllers\EvidenciaController::class,'reportes'])->name('evidencias.reportes');
    Route::post('/reportesContador', [App\Http\Controllers\EvidenciaController::class, 'contarReportes']);
    Route::post('evidencias/mostrar', [App\Http\Controllers\EvidenciaController::class, 'reportesToMostrar'])->name('evidencias.prueba');
    Route::post('/estatus', [App\Http\Controllers\EvidenciaController::class, 'getDocStatus']);
    Route::get('evidencias/create/documento', [App\Http\Controllers\EvidenciaController::class, 'newDoc'])->name('evidencias.crearDoc');
    Route::get('evidencias/mostrar/documentos', [App\Http\Controllers\EvidenciaController::class, 'showDoc'])->name('evidencias.mostrarDoc');
    Route::post('/storeDoc', [App\Http\Controllers\EvidenciaController::class, 'storeDoc'])->name('evidencias.storeDoc');
    Route::post('/actualizarDocs', [App\Http\Controllers\EvidenciaController::class, 'updateTableDocs']);
    Route::get('/deleteDoc/{id}', [App\Http\Controllers\EvidenciaController::class, 'deleteDoc']);
    Route::get('evidencias/create/seccion', [App\Http\Controllers\EvidenciaController::class, 'newSec'])->name('evidencias.crearSec');
    Route::get('evidencias/mostrar/secciones', [App\Http\Controllers\EvidenciaController::class, 'showSec'])->name('evidencias.mostrarSec');
    Route::post('/storeSec', [App\Http\Controllers\EvidenciaController::class, 'storeSec'])->name('evidencias.storeSec');
    Route::post('/actualizarSec', [App\Http\Controllers\EvidenciaController::class, 'updateTableSecs']);
    Route::get('/deleteSec/{id}', [App\Http\Controllers\EvidenciaController::class, 'deleteSec']);
    // Route::patch('/aprobar/{id}', [Solicitudes_vacacionesController::class, 'approve'])->name('solicitars.approve');
    // Route::get('/endPeriod/{rpe}', [Solicitudes_vacacionesController::class, 'endPeriod'])->name('solicitars.endPeriod');
    // Route::patch('/aprobar_vacacion/{id}', [VacacionesFueraController::class, 'approve'])->name('solicitarfuera.approve');

    //Rutas para acceder al inicio de cada módulo:
    Route::get('/evidencias', function(){$vc = DB::table('view_counter')->where('pagina', 'evidencias')->first()->visitas + 1; DB::table('view_counter')->where('pagina', 'evidencias')->update(['visitas'=>$vc]); return view('evidencias.inicio');})->name('evidencias.inicio');
    Route::get('/rij', [App\Http\Controllers\RijController::class, 'inicio'])->name('rijs.inicio');
    Route::get('/evaluacion5s', [App\Http\Controllers\Evaluacion5Controller::class, 'inicio'])->name('evaluacion5s.inicio');
    // Route::get('/siva', function(){$vc = DB::table('view_counter')->where('pagina', 'siva')->first()->visitas + 1; DB::table('view_counter')->where('pagina', 'siva')->update(['visitas'=>$vc]); return view('sivas.inicio');})->name('sivas.inicio');
    Route::get('/usuarios', [App\Http\Controllers\UserController::class, 'inicio'])->name('users.inicio');
    Route::get('/salud', [App\Http\Controllers\MiSaludController::class, 'inicio'])->name('salud.inicio');
    Route::get('/resguardos', [App\Http\Controllers\ResguardosController::class, 'inicio'])->name('resguardos.inicio');
    Route::get('/inventarios', [App\Http\Controllers\InventarioController::class, 'inicio'])->name('inventarios.inicio');


    //Ruta del correo de verificación.
    Route::get('/inventarioEmails', [App\Http\Controllers\InventarioEmailController::class, 'codigoVerificacion'])->name('inventarioEmails.codigoVerificacion');
    Route::get('/codigoInventario', [App\Http\Controllers\InventarioEmailController::class, 'verificarCodigo'])->name('inventarioEmails.verificarCodigo');
    Route::post('/addFoto', [App\Http\Controllers\InventarioEmailController::class, 'addFoto'])->name('inventarioEmails.addFoto');

    Route::get('/mapa', function(){
        return view('mapa');
    })->name('mapa');

    });

Route::middleware(['auth', 'bloquear.form.datos'])->group(function() {

    Route::get('llenar-datos-personales', [\App\Http\Controllers\DatosPersonalesController::class, 'mostrarFormulario'])
        ->name('llenar-datos-personales.form');

    Route::post('llenar-datos-personales', [\App\Http\Controllers\DatosPersonalesController::class, 'guardarDatos'])
        ->name('llenar-datos-personales.store');

});

