<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $carrito;

    protected $listeners = [
        'updateCart' => 'render'
    ];

    public function render()
    {
        $venta = Venta::where('estado', 'Pendiente')
                        ->where('user_id', Auth::user()->id)
                        ->first();

        if ($venta) {
            $this->carrito = Item::where('venta_id', $venta->id)->sum('cantidad');
        }

        return view('livewire.cart');
    }
}
