<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprarCuenta extends Model
{
    use HasFactory;

    public $table = 'comprarcuenta';

    protected $fillable = [
        'numcuenta',
        'nombre',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    public function user()
    {
        return $this->belongsTo(User::class)->select(['name','username']);
    }

    public function post()
    {
        return $this->belongsTo(Post::class)->select(['user_id','id']);
    }

}
