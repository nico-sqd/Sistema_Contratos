<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Caratula extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'caratula';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_proveedor',
        'id_convenio',
        'id_contrato',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class,'id_proveedor');
    }
    public function convenio()
    {
        return $this->belongsTo(Convenio::class,'id_convenio');
    }
    public function contrato()
    {
        return $this->belongsTo(Contrato::class,'id_contrato');
    }
}
