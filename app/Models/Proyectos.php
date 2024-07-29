<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    use HasFactory;

    protected $fillable =  [
        'nombre_empresa',
        'nombre_usuario',
        'email',
        'telefono',
        'comentarios',
    ];
}
