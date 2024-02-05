<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Uniformes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "uniformes";

    protected $fillable =  [    
        'curp',
        'fecha_registro',
        'nueva_existencia',
        'entrada',
        'usados',
        'codigo',
        'descripcion',
        'salida',
        'talla',
        'precio',
        'total',
    ];


}
