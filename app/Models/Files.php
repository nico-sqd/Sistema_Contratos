<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nombre_archivo',
        'user_rut',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_rut');
    }

}
