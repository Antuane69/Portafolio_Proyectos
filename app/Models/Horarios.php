<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Horarios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = "horarios";

    protected $fillable =  [
        'cocinero_lunes',
        'cocinero_martes',
        'cocinero_miercoles',
        'cocinero_jueves',
        'cocinero_viernes',
        'cocinero_sabado',
        'cocinero_domingo'
    ];

}
