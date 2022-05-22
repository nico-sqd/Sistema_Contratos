<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'contrato';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_licitacion',
        'id_contrato',
        'res_adjudicacion',
        'res_apruebacontrato',
        'id_monto',
        'id_tipo_moneda',
        'id_boleta',
        'id_monto_boleta',
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
        return $this->belongsTo(Monto::class,'id_monto');
    }
    public function montoboleta()
    {
        return $this->belongsTo(MontoBoleta::class,'id_monto_boleta');
    }
    public function convenio()
    {
        return $this->belongsTo(Convenio::class,'id_licitacion');
    }
    public function caratula()
    {
        return $this->hasMany(Caratula::class,'id_contrato');
    }
    public function tipomoneda()
    {
        return $this->belongsTo(TipoMoneda::class,'id_tipo_moneda');
    }
}
