<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name',
        'cuit_cuil',
        'address',
        'phone',
        'saldo',
    ];

    // Un cliente puede tener muchos trabajos
    public function works()
    {
        return $this->hasMany(Work::class);
    }

}
