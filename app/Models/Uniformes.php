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
        'fecha_solicitud',
        'tipo_uniforme',
        'codigo',
        'cantidad',
        'total',
        'talla'
    ];

    public function empleado(){
        return $this->belongsTo(Empleados::class, 'curp', 'curp');
    }
}
