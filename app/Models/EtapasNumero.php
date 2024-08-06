<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtapasNumero extends Model
{
    use HasFactory;
    protected $table = "etapas_numero";

    protected $fillable =  [
        'numero_etapa',
        'nombre_etapa',
    ];

    public function Clasificacion()
    {
        return $this->belongsToMany(Etapas::class, 'nombre_etapa', 'estatus');
    }
}
