<?php

namespace App\Models;

use Illuminate\Auth\Events\Authenticated;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Empleados extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    use HasApiTokens;
    use TwoFactorAuthenticatable;
    use HasRoles;

    protected $table = "empleados";

    protected $fillable =  [
        'nombre',
        'curp',
        'rfc',
        'nss',
        'puesto',
        'fecha_ingreso',
        'fecha_nacimiento',
        'fecha_2doContrato',
        'fecha_3erContrato',
        'fecha_indefinido',
        'telefono',
        'num_clinicaSS',
        'salario_dia',
        'imagen_perfil',
        'dias_vacaciones',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    public function vacaciones() {
        return $this->hasMany(Vacaciones::class, 'curp', 'curp');
    }

    public function incapacidades() {
        return $this->hasMany(Incapacidades::class, 'curp', 'curp');
    }

    public function permisos() {
        return $this->hasMany(Permisos::class, 'curp', 'curp');
    }

    public function uniformes() {
        return $this->hasMany(Uniformes::class, 'curp', 'curp');
    }

}