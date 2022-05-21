<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'departamentos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_departamento',
        'codigo_sso',
        'id_subdireccion',
    ];

    public function subdireccion()
    {
        return $this->belongsTo(SubDireccion::class, 'id_subdireccion');
    }

    public function dispositivo()
    {
        return $this->hasMany(Dispositivo::class, 'id_departamento');
    }


}
