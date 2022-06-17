<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Aumento extends Model
{
    use HasFactory;

    protected $table = 'aumentocontrato';

    protected $fillable = [
        'monto_aumento',
        'res_aumento',
        'id_contrato',
        'id_monto_boleta',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
    public function montoboleta()
    {
        return $this->belongsTo(MontoBoleta::class,'id_monto_boleta');
    }
}
