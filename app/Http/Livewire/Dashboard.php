<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public $search;
    public $componentName = 'Dashboard';
    private $paginate = 12;
    protected $paginationTheme = "bootstrap";

    public function render()
    {
        return view('livewire.dashboard')
            ->extends('layouts.theme.app', ['title' => 'Dashboard'])
            ->section('content');
    }

    public function notificar()
    {
        $this->dispatchBrowserEvent('noty', ['msg' => 'Cliente actualizado', 'option' => 0]);
    }
}
