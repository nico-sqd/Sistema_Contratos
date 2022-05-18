<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoletaGarantia extends Model
{
    use HasFactory;

    protected $table = 'boletagarantia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_boleta',
        'documentos_garantia',
    ];

    public function contrato()
    {
        return $this->hasMany(Contrato::class,'id_boleta','id_boleta');
    }
    public function montoboleta()
    {
        return $this->hasMany(MontoBoleta::class,'id_tipo_boleta');
    }
}
