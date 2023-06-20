<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Productos extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;

    public $selected_id;
    public $categoria_id;
    public $nombre;
    public $imagen;
    public $detalle = 'Hola mundo...';
    public $precio;

    public $categorias;

    public $componentName = 'Productos';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function mount()
    {
        $this->categorias = Categoria::all();
    }

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

        //$productos = Producto::where('nombre', 'LIKE', '%' . $this->search . '%')
          //  ->paginate($this->paginate);

        return view('livewire.productos', compact('productos'))
            ->extends('layouts.theme.app', ['title' => 'Productos'])
            ->section('content');
    }

    public function store()
    {
        $rules = [
            'categoria_id'  => ['required'],
            'nombre'        => ['required', 'min:3', 'unique:productos'],
            'precio'        => ['required']
        ];

        $messages = [
            'categoria_id.required' => 'La categoría es requerida.',
            'nombre.required'       => 'El nombre del producto es requerido.',
            'nombre.min'            => 'El nombre del producto de tener al menos 3 caracteres.',
            'nombre.unique'         => 'El nombre del producto ya esta registrado.',
            'precio.required'       => 'El precio del producto es requerido.',
        ];

        $this->validate($rules, $messages);

        $producto = Producto::create([
            'categoria_id'  => $this->categoria_id,
            'nombre'        => $this->nombre,
            'detalle'       => $this->detalle,
            'precio'        => $this->precio
        ]);

        if ($this->imagen) {
            $customFileName = uniqid() . '_.' . $this->imagen->extension();
            $this->imagen->storeAs('public/productos', $customFileName);
            $producto->imagen = 'productos/' . $customFileName;
            $producto->save();
        }

        if ($producto) {
            $this->emit('show-success', 'Producto creado...');
            $this->resetUI();
        }
    }

    public function edit(Producto $producto)
    {
        $this->selected_id  = $producto->id;
        $this->categoria_id = $producto->categoria_id;
        $this->nombre       = $producto->nombre;
        $this->detalle      = $producto->detalle;
        $this->precio       = $producto->precio;
        $this->emit('show-modal');
    }

    public function update()
    {
        $rules = [
            'categoria_id'  => ['required'],
            'nombre'        => ['required', 'min:3', 'unique:productos,nombre,' . $this->selected_id],
            'precio'        => ['required']
        ];

        $messages = [
            'categoria_id.required' => 'La categoría es requerida.',
            'nombre.required'       => 'El nombre del producto es requerido.',
            'nombre.min'            => 'El nombre del producto de tener al menos 3 caracteres.',
            'nombre.unique'         => 'El nombre del producto ya esta registrado.',
            'precio.required'       => 'El precio del producto es requerido.',
        ];

        $this->validate($rules, $messages);

        $producto = Producto::find($this->selected_id);

        $producto->update([
            'categoria_id'  => $this->categoria_id,
            'nombre'        => $this->nombre,
            'detalle'       => $this->detalle,
            'precio'        => $this->precio
        ]);

        if ($this->imagen) {
            if ($producto->imagen !== null) {
                if (file_exists('storage/' . $producto->imagen)) {
                    unlink('storage/' . $producto->imagen);
                }
            }
            $customFileName = uniqid() . '_.' . $this->imagen->extension();
            $this->imagen->storeAs('public/productos', $customFileName);
            $producto->imagen = 'productos/' . $customFileName;
            $producto->save();
        }

        if ($producto) {
            $this->emit('show-success', 'Producto actualizado...');
            $this->resetUI();
        }
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        $this->emit('show-success', 'Producto eliminado...');
        $this->resetUI();
    }

    public function resetUI()
    {
        $this->reset(
            'selected_id',
            'categoria_id',
            'nombre',
            'imagen',
            'detalle',
            'precio'
        );

        $this->resetErrorBag();
    }
}
