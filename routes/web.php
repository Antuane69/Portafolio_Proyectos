<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortafolioController;
use App\Http\Controllers\UsuariosController;
use App\Models\Usuarios;

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
Route::post('/usuario/registro',[UsuariosController::class, 'register'])->name('registro');
Route::post('/usuario/iniciar_sesion',[UsuariosController::class, 'login'])->name('iniciar_sesion');
Route::get('/perfil/{nombre}',[UsuariosController::class, 'profile'])->name('perfil');
Route::post('/perfil/{id}/guardar-cambios',[UsuariosController::class, 'profile_save'])->name('perfil.guardar');
Route::delete('/perfil/{id}/eliminar',[UsuariosController::class, 'profile_delete'])->name('perfil.delete');

Route::post('/solicitud/enviar',[PortafolioController::class, 'store'])->name('solicitud.store');
Route::get('/informacion',[PortafolioController::class, 'informacion'])->name('informacion');
Route::get('/informacion/curriculum',[PortafolioController::class, 'curriculum'])->name('informacion.curriculum');
Route::get('/informacion/FormasDePago',[PortafolioController::class, 'informacion_pagos'])->name('informacion.pagos');
Route::get('/proyectos',[PortafolioController::class, 'proyectos'])->name('proyectos');

Route::get('/auth/google', [UsuariosController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [UsuariosController::class, 'handleGoogleCallback'])->name('auth.redirectGoogle');
