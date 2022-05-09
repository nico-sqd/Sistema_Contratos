<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establecimiento extends Model
{
    use HasFactory;

    protected $table = 'establecimiento';

    public function usuarios()
    {
        return $this->hasMany(User::class,'establecimiento');
    }
}
