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
        'rut_proveedor',
        'vigencia_inicio',
        'vigencia_fin',
        'monto',
        'admin',
    ];

    public function proveedor()
    {
        return $this->hasMany(Proveedor::class,'rut_proveedor');
    }
    public function convenios()
    {
        return $this->belongsTo(Monto::class,'codigo_monto');
    }
}
