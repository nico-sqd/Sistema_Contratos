<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = 'convenios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_licitacion',
        'convenio',
        'rut_proveedor',
        'rut',
        'vigencia_inicio',
        'vigencia_fin',
        'monto',
        'admin',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'rut_proveedor');
    }
    public function monto()
    {
        return $this->belongsTo(Monto::class,'monto','codigo_monto');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'rut');
    }
    public function montoboleta()
    {
        return $this->hasMany(Contrato::class,'id_licitacion');
    }
    public function caratula()
    {
        return $this->hasMany(Caratula::class,'id_convenio');
    }
}
