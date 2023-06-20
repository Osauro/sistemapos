<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Usuarios extends Component
{
    public $search;
    public $selected_id;

    public $name;
    public $email;
    public $celular;
    public $tipo;

    public $componentName = 'Usuarios';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        $usuarios = User::where('name', 'LIKE', '%' . $this->search . '%')
                        ->where('celular', 'LIKE', '%' . $this->search . '%')
                        ->where('email', 'LIKE', '%' . $this->search . '%')
                        ->paginate($this->paginate);

        return view('livewire.usuarios', compact('usuarios'))
            ->extends('layouts.theme.app', ['title' => 'Usuarios'])
            ->section('content');
    }

    public function store()
    {
        $rules = [
            'name'      => ['required', 'min:3', 'unique:users'],
            'email'     => ['required', 'email', 'unique:users'],
            'celular'   => ['required', 'unique:users'],
            'tipo'      => ['required']
        ];

        $messages = [
            'name.required'     => 'El nombre de usuario es requerido.',
            'name.min'          => 'El nombre de usuario de tener al menos 3 caracteres.',
            'name.unique'       => 'El nombre de usuario ya esta registrado.',
            'email.required'    => 'El correo electrónico es requerido.',
            'email.email'       => 'El correo electrónico es incorrecto.',
            'email.unique'      => 'El correo electrónico ya esta registrado.',
            'celular.required'  => 'El celular es requerido.',
            'celular.unique'    => 'El celular ya esta registrado.',
            'tipo.required'     => 'El tipo es requerido.',
        ];

        $this->validate($rules, $messages);

        $usuario = User::create([
            'name'      => $this->name,
            'email'     => $this->email,
            'celular'   => $this->celular,
            'tipo'      => $this->tipo,
            'password'  => bcrypt($this->celular)
        ]);

        if ($usuario) {
            $this->emit('show-success', 'Usuario creado correctamente...');
            $this->resetUI();
        }
    }

    public function edit(User $user)
    {
        $this->selected_id  = $user->id;
        $this->name         = $user->name;
        $this->email        = $user->email;
        $this->celular      = $user->celular;
        $this->tipo         = $user->tipo;
        $this->emit('show-modal');
    }

    public function update()
    {

    }

    public function destroy(User $user)
    {

    }

    public function resetUI()
    {
        $this->reset(
            'name',
            'email',
            'celular',
            'tipo',
            'selected_id',
            'search'
        );

        $this->resetErrorBag();
    }
}
