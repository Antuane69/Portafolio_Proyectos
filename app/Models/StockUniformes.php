<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StockUniformes extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "stock_uniformes";

    protected $fillable =  [    
        'fecha_solicitud',
        'nuevos_existencia',
        'usados_existencia',
        'nuevos_codigo',
        'usados_codigo',
        'nuevos_talla',
        'usados_talla',
        'nuevos_precio',
        'usados_precio',
        'nuevos_descripcion',
        'usados_descripcion'
    ];
}
