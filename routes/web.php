<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function(){
    if(Auth::check()){
        // $totalvehi = Vehiculo::query()->count();
        // $totalprest = Vehiculo::query()->where('rpe','!=','')->count();
        // $totalmant = SolicitudMantenimiento::query()->count();
        // $totalrob = siniestros::query()->count();

        // return view('dashboard',[
        //     'totalvehi' => $totalvehi,
        //     'totalprest' => $totalprest,
        //     'totalmant' => $totalmant,
        //     'totalrob' => $totalrob
        // ]);
    }else{
        return view('auth.login');
    };
})->name('dashboard');



