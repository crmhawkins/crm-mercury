<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmueblesVisitados extends Model
{
    use HasFactory;

    protected $table = "inmuebles_visitados";

    protected $fillable = [
        'cliente_id',
        'inmueble_id',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class);
    }

    public function inmueble()
    {
        return $this->belongsTo(Inmuebles::class);
    }

    
}
