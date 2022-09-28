<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimientos extends Model
{
    use HasFactory;

    protected $table = 'movimientos';

    protected $fillable = [
        'id_contrato',
        'id_oc',
        'valor_total_oc',
        'nmr_factura',
        'fecha_factura',
        'valor_factura',
        'monto_contrato_actualizado',
        'id_establecimiento',
        'id_dispositivo',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
    public function cantidad()
    {
        return $this->hasOne(Cantidad::class,'id_movimiento');
    }
    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class,'id_establecimiento');
    }
    public function dispositivo()
    {
        return $this->belongsTo(Dispositivo::class,'id_dispositivo');
    }
}
