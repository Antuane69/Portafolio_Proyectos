<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProyectosPixel extends Model
{
    use HasFactory;

    protected $table = "proyectos_pixel";
    
    protected $fillable =  [
        'nombre',
        'descripcion',
        'lenguajes',
        'imagen',
    ];
}
