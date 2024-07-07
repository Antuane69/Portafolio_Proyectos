<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortafolioController extends Controller
{
    public function inicio(){
        return view('dashboard');
    }

    public function informacion(){
        return view('informacion');
    }
}
