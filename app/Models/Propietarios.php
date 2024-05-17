<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietarios extends Model
{
    use HasFactory;

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
