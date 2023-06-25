<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PagarVenta extends Component
{
    public $venta;

    public $componentName = 'Pagar venta';

    public function mount()
    {
        $this->venta = Venta::where('estado', 'Pendiente')->where('user_id', Auth::user()->id)->first();
    }


    public function render()
    {
        $items = Item::where('venta_id', $this->venta->id)->get();

        return view('livewire.pagar-venta', compact('items'))
            ->extends('layouts.theme.app', ['title' => 'Dashboard'])
            ->section('content');
    }

    public function nuevaCantidad(Item $item, $cantidad)
    {
        if ($item->producto->stock >= $cantidad) {
            $item->update([
                'cantidad' => $cantidad,
                'subtotal' => $cantidad * $item->producto->precio
            ]);
        } else {
            $this->emit('show-error', 'Producto insuficiente...');
        }
        $this->emit('updateCart');
    }

    public function add(Item $item)
    {

        if ($item->producto->stock >= ($item->cantidad + 1)) {
            $cantidad = $item->cantidad + 1;
            $item->update([
                'cantidad' => $cantidad,
                'subtotal' => $cantidad * $item->producto->precio
            ]);
        } else {
            $this->emit('show-error', 'Producto insuficiente...');
        }
        $this->emit('updateCart');
    }

    public function res(Item $item)
    {
        if ($item->cantidad >= 1) {
            $cantidad = $item->cantidad - 1;
            $item->update([
                'cantidad' => $cantidad,
                'subtotal' => $cantidad * $item->producto->precio
            ]);
        }

        if ($item->cantidad == 0) {
            $item->delete();
        }

        $this->emit('updateCart');
    }
}
