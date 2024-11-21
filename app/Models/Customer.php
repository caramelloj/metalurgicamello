<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nombre',
        'cuit_cuil',
        'direccion',
        'telefono',
        'saldo',
    ];

    // Un cliente puede tener muchos trabajos
    public function works()
    {
        return $this->hasMany(Work::class);
    }

}
