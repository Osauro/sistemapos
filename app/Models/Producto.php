<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'nombre',
        'imagen',
        'detalle',
        'precio'
    ];

    protected $appends = [
        'photo_url',
    ];

    public function getPhotoUrlAttribute()
    {
        return $this->imagen
                    ? Storage::disk('public')->url($this->imagen)
                    : $this->defaultPhotoUrl();
    }

    protected function defaultPhotoUrl()
    {
        $name = trim(collect(explode(' ', $this->nombre))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));
        return 'https://ui-avatars.com/api/?name=' . urlencode($name) . '&color=7F9CF5&background=EBF4FF&size=500';
    }
}
