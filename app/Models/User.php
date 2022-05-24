<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'rut',
        'establecimiento',
        'password',
        'subrogante',
        'correo_subrogante',
        'id_subdireccion',
        'id_departamento',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getEstablecimiento()
    {
        return $this->belongsTo(Establecimiento::class,'establecimiento');
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class,'rut');
    }
    public function subdireccion()
    {
        return $this->belongsTo(SubDireccion::class,'id_subdireccion');
    }
    public function departamento()
    {
        return $this->belongsTo(Departamento::class,'id_departamento');
    }
}
