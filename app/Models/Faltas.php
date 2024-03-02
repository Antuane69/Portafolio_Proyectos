<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faltas extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = "faltas";

    protected $fillable =  [
        'nombre',
        'curp',
        'fecha_solicitud',
        'falta_cometida',
        'amonestacion',
        'acta_administrativa',
        'acta_realizada'
    ];

    public function empleado(){
        return $this->belongsTo(Empleados::class, 'curp', 'curp');
    }
}
