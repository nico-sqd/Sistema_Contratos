<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedor';

    public function direccion()
    {
        return $this->belongsTo(Direccion::class, 'direccion_id');
    }
}
