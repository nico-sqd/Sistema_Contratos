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
        'id_tipo_boleta',
    ];

    public function boletagarantia()
    {
        return $this->belongsTo(BoletaGarantia::class,'id_tipo_boleta');
    }
    public function contrato()
    {
        return $this->hasOne(Contrato::class,'id_monto_boleta');
    }
}
