<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Categorias extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $search;
    public $selected_id;

    public $nombre;
    public $imagen;

    public $componentName = 'Categorias';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $categorias = Categoria::where('nombre', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->paginate);

        return view('livewire.categorias', compact('categorias'))
            ->extends('layouts.theme.app', ['title' => 'Categorias'])
            ->section('content');
    }

    public function store()
    {
        $rules = [
            'nombre'      => ['required', 'min:3', 'unique:categorias'],
        ];

        $messages = [
            'nombre.required'     => 'El nombre de la categoria es requerido.',
            'nombre.min'          => 'El nombre de la categoria de tener al menos 3 caracteres.',
            'nombre.unique'       => 'El nombre de la categoria ya esta registrado.'
        ];

        $this->validate($rules, $messages);

        $categoria = Categoria::create([
            'nombre'      => $this->nombre
        ]);

        if ($this->imagen) {
            $customFileName = uniqid() . '_.' . $this->imagen->extension();
            $this->imagen->storeAs('public/categorias', $customFileName);
            $categoria->imagen = 'categorias/' . $customFileName;
            $categoria->save();
        }

        if ($categoria) {
            $this->emit('show-success', 'Categoria creada...');
            $this->resetUI();
        }
    }

    public function edit(Categoria $categoria)
    {
        $this->selected_id  = $categoria->id;
        $this->nombre       = $categoria->nombre;
        $this->emit('show-modal');
    }

    public function update()
    {
        $rules = [
            'nombre'      => ['required', 'min:3', 'unique:categorias,nombre,' . $this->selected_id]
        ];

        $messages = [
            'nombre.required'     => 'El nombre de la categoria es requerido.',
            'nombre.min'          => 'El nombre de la categoria de tener al menos 3 caracteres.',
            'nombre.unique'       => 'El nombre de la categoria ya esta registrado.'
        ];

        $this->validate($rules, $messages);

        $categoria = Categoria::find($this->selected_id);

        $categoria->update([
            'nombre'      => $this->nombre
        ]);

        if ($this->imagen) {
            $customFileName = uniqid() . '_.' . $this->imagen->extension();
            $this->imagen->storeAs('public/categorias', $customFileName);
            $categoria->imagen = 'categorias/' . $customFileName;
            $categoria->save();
        }

        if ($categoria) {
            $this->emit('show-success', 'Categorias actualizado...');
            $this->resetUI();
        }
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        $this->emit('show-success', 'Categorias eliminado...');
        $this->resetUI();
    }

    public function resetUI()
    {
        $this->reset(
            'nombre',
            'imagen',
            'selected_id',
            'search'
        );

        $this->resetErrorBag();
    }
}
