<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Multas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'multas';

    protected $fillable = [
        'nmr_memo_informe',
        'nmr_oficio',
        'fecha_oficio',
        'fecha_notificacion',
        'plazo_dias_notificacion',
        'presenta_descargos',
        'nmr_memo_juridica',
        'fecha_memo',
        'nmr_res_exenta',
        'fecha_res_exenta',
        'plazo_dias_exenta',
        'presenta_rec_de_reposicion',
        'nmr_memo_juridica_2',
        'nmr_res_exenta_2',
        'fecha_res_exenta_2',
        'descripcion',
        'nmr_factura',
        'nmr_ingreso',
        'fecha_comprobante',
        'id_contrato',
        'id_estadomulta',
        'id_estadotramite',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
    public function estadopagomulta()
    {
        return $this->belongsTo(EstadoPagoMulta::class,'id_estadomulta');
    }
    public function estadotramitemulta()
    {
        return $this->belongsTo(EstadoTramiteMulta::class,'id_estadotramite');
    }
}
