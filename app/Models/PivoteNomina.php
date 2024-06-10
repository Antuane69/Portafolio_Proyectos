<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivoteNomina extends Model
{
    use HasFactory;
    protected $table = "pivote_nomina";

    protected $fillable =  [
        'id_nomina',
        'curp',
        'uniforme',
        'exportado',
    ];

    public function pivote(){
        return $this->belongsTo(Nomina::class, 'curp', 'id_nomina');
    }
}
