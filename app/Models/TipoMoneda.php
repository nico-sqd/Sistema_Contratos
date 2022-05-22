<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMoneda extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tipo_moneda';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_tipo',
        'Nombre_tipo',
    ];

    public function monto()
    {
        return $this->hasMany(Monto::class,'id_tipo_moneda','id_tipo');
    }
    public function contrato()
    {
        return $this->hasMany(Contrato::class,'id_tipo_moneda');
    }
}
