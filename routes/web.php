<?php

use App\Charts\ChartCreate;
use App\Models\ComprarOferta;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ComprarController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\HighChartController;
use App\Http\Controllers\PostIndexController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ComprarCuentaController;
use App\Http\Controllers\ComprarOfertaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/motorsnew', HomeController::class)->name('faq');
Route::get('/pagprincipal', HomeController::class)->name('home');
Route::post('/pagprincipal', HomeController::class, 'filtrar')->name('home.filtrar');
Route::post('/pagprincipal', HomeController::class, 'ordenar')->name('home.ordenar');

Route::post('/likes/{user:username}/{posts}', [LikeController::class,'store'])->name('posts.likes');
Route::delete('/likes/{user:username}/{posts}', [LikeController::class,'destroy'])->name('posts.likes.destroy');

Route::get('/formadepago/comprar/{post}',[ComprarController::class,'view'])->name('compra.index');
Route::get('/comprar/{post}',[ComprarController::class,'index'])->name('comprar');
Route::post('/comprar/{post}',[ComprarController::class,'store'])->name('comprar');

Route::get('/comprarcuenta/{post}',[ComprarCuentaController::class,'index'])->name('comprarcuenta');
Route::post('/comprarcuenta/{post}',[ComprarCuentaController::class,'store'])->name('comprarcuenta');

Route::get('/compraroferta/{post}',[ComprarOfertaController::class,'index'])->name('compraroferta.index');
Route::post('/compraroferta/{post}',[ComprarOfertaController::class,'store'])->name('compraroferta.store');
Route::post('/compraroferta/{ofertas}/aceptar',[ComprarOfertaController::class,'aceptar'])->name('compraroferta.accept');
Route::delete('/compraroferta/{ofertas}/rechazar',[ComprarOfertaController::class,'destroy'])->name('compraroferta.destroy');
Route::get('/{user:username}/ofertasenviadas',[ComprarOfertaController::class, 'view'])->name('ofertas.view');
Route::get('/{user:username}/compras',[ComprarOfertaController::class, 'clients'])->name('comprascliente.index');

Route::get('/editar-perfil',[PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil',[PerfilController::class, 'store'])->name('perfil.store');
Route::get('/vendedor/{post}',[VendedorController::class,'index'])->name('perfilvendedor.index');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/{user:username}',[PostController::class, 'index'])->name('posts.index');
Route::get('/{user:username}/postsvendor/{a}',[PostController::class, 'view'])->name('posts.view');
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/posts/{user:username}/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/posts/{user:username}/{post}/pause',[PostController::class,'pause'])->name('posts.pause');
Route::post('/posts/{user:username}/{post}/play',[PostController::class,'play'])->name('posts.play');

Route::post('/posts/{user:username}/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('posts.destroy');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

Route::post('/{user:username}/follow',[FollowerController::class,'store'])->name('users.follow');
Route::delete('/{user:username}/unfollow',[FollowerController::class,'destroy'])->name('users.unfollow');

Route::get('/editar-publicacion/{post}',[PostIndexController::class, 'index'])->name('postindex.index');
Route::post('/editar-publicacion/{post}',[PostIndexController::class, 'store'])->name('postindex.store');

Route::get('/{user:username}/{post}/ventas',[VentasController::class, 'index'])->name('ventas.index');
