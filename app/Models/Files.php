<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $table = 'files';

    protected $fillable = [
        'uuid',
        'nombre_archivo',
        'id_contrato',
    ];

    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }

}
