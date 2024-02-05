<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleados extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "empleados";

    protected $fillable =  [
        'nombre',
        'curp',
        'rfc',
        'nss',
        'puesto',
        'fecha_ingreso',
        'fecha_nacimiento',
        'fecha_2doContrato',
        'fecha_3erContrato',
        'fecha_indefinido',
        'telefono',
        'num_clinicaSS',
        'salario_dia',
    ];
}
