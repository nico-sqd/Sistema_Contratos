<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cantidad extends Model
{
    use HasFactory;

    protected $table = 'cantidades';

    protected $fillable = [
        'id_unidad',
        'cantidad',
        'valor_unitario',
        'id_movimiento',
    ];

    public function movimiento()
    {
        return $this->belongsTo(Movimientos::class,'id_movimiento');
    }
    public function unidadmedida()
    {
        return $this->belongsTo(UnidadMedida::class,'id_unidad');
    }
}
