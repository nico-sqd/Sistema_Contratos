<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoletaGarantia extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'boletagarantia';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'documentos_garantia',
    ];

    public function contrato()
    {
        return $this->hasMany(Contrato::class,'id_boleta');
    }
    public function montoboleta()
    {
        return $this->hasMany(MontoBoleta::class,'id_tipo_boleta');
    }
}
