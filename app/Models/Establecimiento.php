<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\SoftDeletes;

class Establecimiento extends Model
{
    use HasFactory , HasApiTokens , Notifiable, SoftDeletes;

    protected $table = 'establecimiento';

    protected $fillable = [
        'establecimiento',
        'codigo_deis',
        'abreviacion',
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class,'establecimiento');
    }
}
