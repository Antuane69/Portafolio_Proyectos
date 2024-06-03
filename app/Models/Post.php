<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Comprar;
use App\Models\Comentario;
use App\Models\ComprarCuenta;
use App\Models\ComprarOferta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'marca',
        'modelo',
        'anio',
        'color',
        'precio',
        'fallas',
        'descripcion',
        'existencia',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }
 
    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function checkLike(User $user)
    {
        return $this->likes->contains('user_id',$user->id);
    }

    public function compras()
    {
        return $this->hasMany(Comprar::class);
    }
    
    public function compracuenta()
    {
        return $this->hasMany(ComprarCuenta::class);
    }

    public function compraoferta()
    {
        return $this->hasMany(ComprarOferta::class);
    }

    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }
}
