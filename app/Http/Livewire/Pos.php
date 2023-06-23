<?php

namespace App\Http\Livewire;

use App\Models\Producto;
use Livewire\Component;

class Pos extends Component
{
    public $search;
    public $componentName = 'Pos';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $productos = Producto::join('categorias', function($join) {
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
}
