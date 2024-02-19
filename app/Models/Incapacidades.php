<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Incapacidades extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = "incapacidad";

    protected $fillable =  [
        'curp',
        'fecha_inicio',
        'fecha_regreso',
        'dias_totales',
        'motivo',
        'comentarios',
    ];

    public function empleado(){
        return $this->belongsTo(Empleados::class, 'curp', 'curp');
    }

}
