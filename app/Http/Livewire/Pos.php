<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Pos extends Component
{
    public $venta;

    public $search;
    public $componentName = 'Pos';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->venta = Venta::where('estado', 'Pendiente')
            ->where('user_id', Auth::user()->id)
            ->first();
    }

    public function render()
    {
        $productos = Producto::join('categorias', function ($join) {
            $join->on('categorias.id', '=', 'productos.categoria_id');
        })->select(
            'productos.*',
            'categorias.nombre as categoria'
        )->where('productos.nombre', 'LIKE', '%' . $this->search . '%')
            ->orWhere('productos.precio', 'LIKE', '%' . $this->search . '%')
            ->orWhere('productos.detalle', 'LIKE', '%' . $this->search . '%')
            ->orWhere('categorias.nombre', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->paginate);

        return view('livewire.pos', compact('productos'))
            ->extends('layouts.theme.app', ['title' => 'Pos'])
            ->section('content');
    }

    public function addItem(Producto $producto)
    {
        if (!$this->venta) {
            $this->iniciarVenta();
        }

        $item = Item::where('venta_id', $this->venta->id)->where('producto_id', $producto->id)->first();

        if ($item) {
            if ($producto->stock > 0) {
                $producto->update([
                    'stock' => $producto->stock - 1
                ]);
            }

            $cantidad = $item->cantidad + 1;

            $item->update([
                'cantidad' => $cantidad,
                'subtotal' => $cantidad * $producto->precio
            ]);
        } else {
            $item = Item::create([
                'venta_id' => $this->venta->id,
                'producto_id' => $producto->id,
                'cantidad' => 1,
                'subtotal' => $producto->precio
            ]);
        }

        $this->emit('show-success', 'Producto agregado...');
    }


    public function iniciarVenta()
    {
        $this->venta = Venta::create([
            'user_id' => Auth::user()->id
        ]);
    }
}
