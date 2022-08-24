<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;

    protected $table = 'unidadesmedidas';

    protected $fillable = [
        'unidad',
    ];

    public function cantidad()
    {
        return $this->hasOne(Cantidad::class,'id_unidad');
    }
    public function movimiento()
    {
        return $this->belongsTo(Movimiento::class,'id_movimiento');
    }
}
