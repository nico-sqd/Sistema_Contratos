<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $table = 'contrato';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_contrato',
        'res_adjudicacion',
        'res_aprueba_contrato',
        'id_monto',
        'id_boleta',
        'id_modalidad',
        'aumento_contrato',
        'res_aumento',
    ];

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class,'id_modalidad','id_modalidad');
    }
    public function boletagarantia()
    {
        return $this->belongsTo(BoletaGarantia::class,'id_boleta','id_boleta');
    }
    public function monto()
    {
        return $this->belongsTo(Monto::class,'id_monto','codigo_monto');
    }
}
