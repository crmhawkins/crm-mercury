<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InmueblesRecibidos extends Model
{
    use HasFactory;

    protected $table = 'inmuebles_recibidos';

    protected $fillable = [
        'cliente_id',
        'inmueble_id',
    ];
}
