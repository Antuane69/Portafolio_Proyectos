<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitudes extends Model
{
    use HasFactory;

    protected $fillable =  [
        'nombre',
        'adaptable',
        'archivos',
        'commerce',
        'pagos',
        'servidor',
        'usuarios',
        'requerimientos',
        'nombre_usuario',
        'estatus',
        'comentarios',
        'fecha_entrega',
    ];

    public function Evidencias()
    {
        return $this->hasMany(Upload::class, 'solicitud_id', 'id');
    }

    public function Etapas()
    {
        return $this->hasMany(Etapas::class, 'solicitud_id', 'id');
    }

    public function ultimaEtapa()
    {
        return $this->hasOne(Etapas::class, 'solicitud_id', 'id')->latestOfMany();
    }
}
