<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proveedor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_proveedor',
        'rut_proveedor',
        'representante',
        'rut_representante',
        'mail_representante',
        'telefono_representante',
        'direccion_id',
    ];

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }

    public function convenios()
    {
        return $this->hasMany(Convenios::class, 'rut_proveedor');
    }
    public function caratula()
    {
        return $this->hasMany(Caratula::class,'id_proveedor');
    }
}
