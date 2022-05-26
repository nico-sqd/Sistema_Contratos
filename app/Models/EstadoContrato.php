<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EstadoContrato extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'estadocontrato';

    protected $fillable = [
        'estado_contrato',
    ];

    public function contrato()
    {
        return $this->hasMany(Contrato::class,'estado_contrato');
    }

}
