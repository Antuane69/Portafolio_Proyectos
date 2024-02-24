<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bajas extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "bajas";

    protected $fillable =  [
        'nombre',
        'curp',
        'nss',
        'puesto',
        'fecha_nacimiento',
        'fecha_ingreso',
        'fecha_baja',
        'antiguedad',
        'causa_baja',
        'tiempo_anticipacion',
        'telefono',
        'num_clinicaSS',
        'total_bajas',
        'imagen_perfil',
    ];
}
