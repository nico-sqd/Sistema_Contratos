<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monto extends Model
{
    use HasFactory;

    protected $table = 'monto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'moneda',
        'id_tipo_moneda',
    ];

    public function tipo_moneda()
    {
        return $this->belongsTo(TipoMoneda::class,'id_tipo','id_tipo_moneda');
    }
    public function factura()
    {
        return $this->belongsTo(Factura::class,'id_monto');
    }
    public function convenios()
    {
        return $this->hasMany(Convenio::class,'monto','codigo_monto');
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class,'id_monto','codigo_monto');
    }
}
