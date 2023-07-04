<?php

namespace App\Http\Livewire;

use App\Models\Item;
use App\Models\Movimiento;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PagarVenta extends Component
{
    public $venta;
    public $efectivo;
    public $cambio;
    public $total;

    public $componentName = 'Pagar venta';

    public function mount()
    {
        $this->venta = Venta::where('estado', 'Pendiente')->where('user_id', Auth::user()->id)->first();

        if (!$this->venta) {
            abort(403, 'No hay ventas pendientes...');
        }
    }


    public function render()
    {
        $items = Item::where('venta_id', $this->venta->id)->get();
        $this->total = number_format($items->sum('subtotal'), 2);
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

    public function nuevoEfectivo($efectivo)
    {
        if ($efectivo >= $this->total) {
            $this->cambio = number_format(($this->efectivo - $this->total), 2);
            $this->efectivo = number_format($efectivo, 2);
        } else {
            $this->emit('show-error', 'Efectivo insuficiente...');
            $this->reset('efectivo', 'cambio', 'total');
        }
    }

    public function pagar()
    {
        if (!$this->efectivo) {
            $this->efectivo = number_format($this->total, 2);
            $this->cambio = number_format(0, 2);
        }

        if ($this->efectivo >= $this->total) {
            $this->cambio = number_format(($this->efectivo - $this->total), 2);
            $this->efectivo = number_format($this->efectivo, 2);
        } else {
            $this->emit('show-error', 'Efectivo insuficiente...');
            $this->reset('efectivo', 'cambio', 'total');
        }

        $rules = [
            'efectivo'      => ['required'],
            'cambio'        => ['required'],
            'total'         => ['required']
        ];

        $messages = [
            'efectivo.required'  => 'El efectivo es requerido.',
            'cambio.required'    => 'El cambio es requerido.',
            'total.required'     => 'El total es requerido.'
        ];

        $this->validate($rules, $messages);

        $saldo = Movimiento::orderBy('id', 'DESC')->pluck('saldo')->first();

        $movimiento = Movimiento::create([
            'user_id'   => Auth::user()->id,
            'detalle'   => 'Venta Folio #' . $this->venta->id,
            'ingreso'   => $this->total,
            'saldo'     => $saldo + $this->total
        ]);

        if (!$movimiento) {
            return;
        }

        foreach ($this->venta->items as $item) {
            $item->producto->update([
                'stock' => $item->producto->stock - $item->cantidad
            ]);
        }

        $this->venta->update([
            'efectivo'  => $this->efectivo,
            'cambio'    => $this->cambio,
            'total'     => $this->total,
            'estado'    => 'Completado'
        ]);

        $this->emit('show-success', 'Venta finalizada...');

        return redirect()->route('ventas');
    }

    public function cancelar()
    {
        $this->venta->delete();
        return redirect()->route('pos');
    }
}
