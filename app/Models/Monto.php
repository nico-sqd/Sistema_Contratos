<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monto extends Model
{
    use HasFactory;

    protected $table = 'monto';

    public function tipo_moneda()
    {
        return $this->belongsTo(TipoMoneda::class,'id_tipo_moneda');
    }
    public function factura()
    {
        return $this->belongsTo(Factura::class,'codigo_monto');
    }
}
