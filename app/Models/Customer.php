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
        'saldo'
    ];

    public function scopeSearchCustomer($query, $nombre)
    {
        return $query->where('name', 'Like', "%$nombre%");
    }
}
