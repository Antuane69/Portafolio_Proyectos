<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumTrabajo extends Model
{
    use HasFactory;
    protected $table = "num_trabajo";

    protected $fillable =  [
        'numero',
        'nombre',
    ];
}
