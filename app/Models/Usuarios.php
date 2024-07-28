<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Auth\Events\Authenticated;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Usuarios extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $dates = ['deleted_at'];

    protected $fillable =  [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'nombre_usuario',
        'nombre_empresa',
        'email',
        'email_verified_at',
        'telefono',
        'ubicacion',
        'comentarios',
        'imagen_perfil',
        'password',
        'google_id',
    ];
    
    protected $hidden = [
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
}
