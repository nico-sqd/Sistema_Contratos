<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MontoBoleta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'montoboleta';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'monto_boleta',
        'fecha_vencimiento',
        'id_boleta',
        'id_tipo_boleta',
        'id_moneda',
        'otraboleta',
        'institucion',
        'id_contrato_original',
        'id_contrato_modificada',
        'archivo',
    ];

    public function boletagarantia()
    {
        return $this->belongsTo(BoletaGarantia::class,'id_tipo_boleta');
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class,'id_monto_boleta');
    }
    public function aumento()
    {
        return $this->hasOne(Aumento::class,'id_monto_boleta');
    }
    public function tipomoneda()
    {
        return $this->belongsTo(TipoMoneda::class,'id_moneda');
    }
    public function file()
    {
        return $this->belongsTo(Files::class,'archivo');
    }
}
