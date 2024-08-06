<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etapas extends Model
{
    use HasFactory;

    protected $fillable =  [
        'solicitud_id',
        'comentarios',
        'estatus',
        'archivos_id',
    ];

    public function Etapas()
    {
        return $this->belongsTo(Solicitudes::class, 'id', 'solicitud_id');
    }

    public function Archivos()
    {
        return $this->hasMany(Upload::class, 'id', 'archivos_id');
    }

    public function Clasificacion()
    {
        return $this->belongsTo(EtapasNumero::class, 'estatus', 'nombre_etapa');
    }
}
