<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'detalle',
        'ingreso',
        'egreso',
        'saldo'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}
