<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Herramientas extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = "herramientas";

    protected $fillable =  [
        'nombre',
        'fecha_registro',
        'imagen',
        'descripcion',
        'area',
        'precio', 
        'cantidad',
        'total',   
        'reporte_pdf',   
    ];

}
