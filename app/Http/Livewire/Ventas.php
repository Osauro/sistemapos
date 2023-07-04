<?php

namespace App\Http\Livewire;

use App\Models\Movimiento;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Ventas extends Component
{
    use WithPagination;

    public $search;
    public $selected_id;

    public $venta_ver;

    public $componentName = 'Ventas';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";


    public function render()
    {
        $ventas = Venta::orderBy('id', 'DESC')->paginate($this->paginate);
        return view('livewire.ventas', compact('ventas'))
            ->extends('layouts.theme.app', ['title' => 'Ventas'])
            ->section('content');
    }

    public function edit(Venta $venta)
    {
        $venta_pendiente = Venta::where('estado', 'Pendiente')->first();

        if ($venta_pendiente) {
            $this->emir('error', 'Existen ventas pendientes...');
            return;
        }

        $saldo = Movimiento::orderBy('id', 'DESC')->pluck('saldo')->first();

        $movimiento = Movimiento::create([
            'user_id'   => Auth::user()->id,
            'detalle'   => 'Devolución Folio #' . $venta->id,
            'egreso'    => $venta->total,
            'saldo'     => $saldo - $venta->total
        ]);

        if (!$movimiento) {
            return;
        }

        foreach ($venta->items as $item) {
            $item->producto->update([
                'stock' => $item->producto->stock + $item->cantidad
            ]);
        }

        $venta->update([
            'efectivo'  => 0,
            'cambio'    => 0,
            'total'     => 0,
            'estado'    => 'Pendiente'
        ]);

        return redirect()->route('pagar-venta');
    }

    public function ver(Venta $venta)
    {
        $this->venta_ver = $venta;
        $this->emit('show-modal');
    }
}
