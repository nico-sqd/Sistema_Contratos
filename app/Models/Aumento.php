<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Aumento extends Model
{
    use HasFactory;

    protected $table = 'aumentocontrato';

    protected $fillable = [
        'monto_aumento',
        'res_aumento',
        'id_contrato',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
}
