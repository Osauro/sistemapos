<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'venta_id',
        'producto_id',
        'cantidad',
        'subtotal'
    ];

    public $timestamps = false;

    public function producto()
    {
        return $this->hasOne(Producto::class, 'id', 'producto_id');
    }
}
