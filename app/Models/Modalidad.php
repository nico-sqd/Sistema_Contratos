<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modalidad extends Model
{
    use HasFactory;

    protected $table = 'modalidad';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_modalidad',
        'nombre_modalidad',
        'abreviacion_modalidad',
    ];

    public function contratos()
    {
        return $this->hasMany(Contrato::class,'id_modalidad','id_modalidad');
    }
}
