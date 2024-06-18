<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Propietarios extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "propietarios";

    protected $fillable = [
        'nombre',
        'apellidos',
        'dni',
        'telefono',
        'correo',
    ];

    public function inmuebles()
    {
        return $this->hasMany(Inmuebles::class);
    }
    
}
