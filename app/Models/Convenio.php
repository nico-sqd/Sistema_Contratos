<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model
{
    use HasFactory;

    protected $table = 'convenios';

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_licitacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_licitacion',
        'convenio',
        'rut_proveedor',
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
}
