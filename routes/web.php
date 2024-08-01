<?php

use App\Models\Usuarios;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProyectosController;
use App\Http\Controllers\PortafolioController;

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
Route::get('/dashboard',[PortafolioController::class, 'inicio'])->name('dashboard');
Route::get('/',[PortafolioController::class, 'inicio']);
Route::get('/informacion',[PortafolioController::class, 'informacion'])->name('informacion');
Route::get('/informacion/curriculum',[PortafolioController::class, 'curriculum'])->name('informacion.curriculum');
Route::get('/informacion/FormasDePago',[PortafolioController::class, 'informacion_pagos'])->name('informacion.pagos');
Route::get('/informacion/ProteccionDeDatos',[PortafolioController::class, 'proteccion_datos'])->name('informacion.proteccionDatos');

Route::post('/usuario/registro',[UsuariosController::class, 'register'])->name('registro');
Route::post('/usuario/iniciar_sesion',[UsuariosController::class, 'login'])->name('iniciar_sesion');
Route::get('/perfil/{nombre}',[UsuariosController::class, 'profile'])->name('perfil');
Route::post('/perfil/{id}/guardar-cambios',[UsuariosController::class, 'profile_save'])->name('perfil.guardar');
Route::delete('/perfil/{id}/eliminar',[UsuariosController::class, 'profile_delete'])->name('perfil.delete');
Route::get('/auth/google', [UsuariosController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [UsuariosController::class, 'handleGoogleCallback'])->name('auth.redirectGoogle');

Route::get('/NuestrosProyectos',[ProyectosController::class, 'proyectos'])->name('proyectos');
Route::post('/cotizacion/guardar',[ProyectosController::class, 'cotizacion_store'])->name('cotizacion.store');
Route::get('/solicitudes/CrearSolicitud',[ProyectosController::class, 'crear_solicitud'])->name('proyectos.crear_solicitud');
Route::post('/solicitudes/GuardarSolicitud',[ProyectosController::class, 'guardar_solicitud'])->name('proyectos.guardar_solicitud');
Route::get('/solicitudesPendientes/{nombre}',[ProyectosController::class, 'solicitudes_pendientes'])->name('proyectos.mostrarSolicitudesPendientes');

Route::post('/upload', [UploadController::class, 'upload'])->name('upload');
Route::get('upload/MostrarEvidencia/{archivo}', [UploadController::class, 'show'])->name('upload.show');
Route::delete('upload/evidencia/{archivo}', [UploadController::class, 'destroy'])->name('upload.destroy');

