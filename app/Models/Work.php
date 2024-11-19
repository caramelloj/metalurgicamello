<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = [
        'customer_id',
        'titulo',
        'detalle',
        'materiales',
        'costo_materiales',
        'costo_trabajo',
        'horas_trabajadas',
        'fecha_inicio',
        'fecha_fin',
        'materiales',
        'imagenes',
        'nombre_cliente'

    ];

    // Un trabajo pertenece a un cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // Conversion de datos
    protected $casts = [
        'materiales' => 'array',
        'fecha_inicio' => 'date',
        'fecha_fin' => 'date',
    ];

}
