<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inmuebles extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $table = "inmuebles";

    protected $fillable = [
        'titulo',
        'descripcion',
        'm2',
        'm2_construidos',
        'valor_referencia',
        'habitaciones',
        'banos',
        'tipo_vivienda_id',
        'ubicacion',
        'cod_postal',
        'cert_energetico',
        'cert_energetico_elegido',
        'inmobiliaria',
        'estado',
        'vendedor_id',
        'galeria',
        'disponibilidad',
        'otras_caracteristicas',
        'referencia_catastral',
        'dormitorios',
        'piscina',
        'garaje',
        'ibi',
        'coste_basura',
        'precio_venta',
        'alquiler_semana',
        'alquiler_mes',
        'propietario_id',
        'direccion',
        'localidad',
        'tipo_inmueble'



    ];

    public function propietario()
    {
        return $this->belongsTo(Propietarios::class);
    }

}
