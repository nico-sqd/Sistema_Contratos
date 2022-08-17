<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoPagoMulta extends Model
{
    use HasFactory;

    protected $table = 'estadopagomulta';

    protected $fillable = [
        'estado_pago',
    ];

    public function multa()
    {
        return $this->hasOne(Multas::class,'id_estadomulta');
    }
}
