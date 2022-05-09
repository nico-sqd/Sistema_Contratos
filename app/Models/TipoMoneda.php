<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMoneda extends Model
{
    use HasFactory;

    protected $table = 'tipo_moneda';

    public function monto()
    {
        return $this->hasMany(Monto::class,'id_tipo_moneda');
    }
}
