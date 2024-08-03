<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;
    protected $table = "upload";

    protected $fillable =  [
        'nombre',
        'solicitud_id',
        'ubicacion',
    ];

    public function getUrlAttribute()
    {
        return route('upload.show', ['archivo' => $this]);
    }

    public function getRemoveAttribute()
    {
        return route('upload.destroy', ['archivo' => $this]);
    }

    public function Evidencias()
    {
        return $this->belongsTo(Solicitudes::class, 'id', 'solicitud_id');
    }
}
