<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PortafolioController extends Controller
{
    public function inicio(){
        return view('dashboard');
    }

    public function informacion(){
        return view('informacion');
    }

    public function curriculum(){
        $path = public_path('CV_AntuaneAlexander.pdf');
        
        if (file_exists($path)) {
            $headers = ['Content-Type' => 'application/pdf'];
            return response()->file($path, $headers);
        };
    }
}
