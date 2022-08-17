<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTramiteMulta extends Model
{
    use HasFactory;

    protected $table = 'estadotramitemulta';

    protected $fillable = [
        'estado_tramite',
    ];

    public function multa()
    {
        return $this->hasOne(Multas::class,'id_estadotramite');
    }
}
