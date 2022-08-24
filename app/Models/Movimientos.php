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
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
    public function cantidad()
    {
        return $this->hasMany(Cantidad::class,'id_movimiento');
    }
}
