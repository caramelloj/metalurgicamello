<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'titulo',
        'detalle',
        'costo_materiales',
        'costo_trabajo',
        'horas_trabajadas',
        'fecha_inicio',
        'fecha_fin',
        'materiales'
    ];

    // Un trabajo pertenece a un cliente
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
