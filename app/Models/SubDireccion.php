<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class SubDireccion extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'subdirecciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_subdireccion',
        'id_establecimiento',
    ];

    public function establecimiento()
    {
        return $this->belongsTo(Establecimiento::class, 'id_establecimiento');
    }

    public function departamento()
    {
        return $this->hasMany(Departamento::class, 'id_subdireccion');
    }

    public function subdireccion()
    {
        return $this->hasMany(Dispositivo::class, 'id_subdireccion');
    }

    public function user()
    {
        return $this->hasMany(User::class,'id_subdireccion');
    }

}
