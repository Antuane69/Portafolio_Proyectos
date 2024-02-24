<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HerramientasPivote extends Model
{
    use HasFactory;
    protected $table = "herramientas_pivote";

    protected $fillable =  [
        'curp',
        'nombre',
        'fecha_solicitud', 
    ];
}
