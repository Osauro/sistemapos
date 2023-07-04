<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'efectivo',
        'cambio',
        'total',
        'estado'
    ];

    public function items()
    {
        return $this->hasMany(Item::class, 'venta_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
