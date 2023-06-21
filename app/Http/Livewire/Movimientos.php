<?php

namespace App\Http\Livewire;

use App\Models\Movimiento;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Movimientos extends Component
{
    public $search;
    public $selected_id;

    public $detalle;
    public $tipo;
    public $monto;

    public $componentName = 'Movimientos';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $movimientos = Movimiento::where('detalle', 'LIKE', '%' . $this->search . '%')
            ->orderBy('id', 'DESC')
            ->paginate($this->paginate);

        return view('livewire.movimientos', compact('movimientos'))
            ->extends('layouts.theme.app', ['title' => 'Movimientos'])
            ->section('content');
    }

    public function store()
    {
        $rules = [
            'detalle'   => ['required', 'min:3'],
            'tipo'      => ['required'],
            'monto'     => ['required']
        ];

        $messages = [
            'detalle.required'  => 'El detalle de movimiento es requerido.',
            'tipo.required'     => 'El tipo del movimiento es requerido.',
            'monto.required'    => 'El monto del movimiento es requerido.'
        ];

        $this->validate($rules, $messages);

        $saldo = Movimiento::orderBy('id', 'DESC')->pluck('saldo')->first();

        if ($this->tipo === 'Ingreso') {
            $movimiento = Movimiento::create([
                'user_id'   => Auth::user()->id,
                'detalle'   => $this->detalle,
                'ingreso'   => $this->monto,
                'saldo'     => $saldo + $this->monto
            ]);
        } else {
            $movimiento = Movimiento::create([
                'user_id'   => Auth::user()->id,
                'detalle'   => $this->detalle,
                'egreso'    => $this->monto,
                'saldo'     => $saldo - $this->monto
            ]);
        }

        if ($movimiento) {
            $this->emit('show-success', 'Moviemiento creado...');
            $this->resetUI();
        }
    }

    public function destroy(Movimiento $movimiento)
    {
        $movimiento->delete();
        $this->emit('show-success', 'Movimiento eliminado...');
        $this->resetUI();
    }

    public function resetUI()
    {
        $this->reset(
            'detalle',
            'tipo',
            'monto'
        );

        $this->resetErrorBag();
    }
}
