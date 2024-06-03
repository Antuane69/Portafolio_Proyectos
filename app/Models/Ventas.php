<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'usertajeta_id',
        'usercuenta_id',
        'useroferta_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function post()
    {
        return $this->hasMany(Post::class)->select(['user_id','id','titulo','precio','existencia','estado']);
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
}
