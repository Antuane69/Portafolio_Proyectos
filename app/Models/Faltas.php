<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faltas extends Model
{
    use HasFactory;
    use SoftDeletes;
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

}
