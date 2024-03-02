<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacaciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = "vacaciones";

    protected $fillable =  [    
        'curp',
        'fecha_solicitud',
        'fecha_inicioVac',
        'fecha_regresoVac',
        'total_diasDescanso',
        'dias_usados',
    ];

    public function empleado(){
        return $this->belongsTo(Empleados::class, 'curp', 'curp');
    }

}
