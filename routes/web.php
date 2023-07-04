<?php

use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Categorias;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Movimientos;
use App\Http\Livewire\PagarVenta;
use App\Http\Livewire\Pos;
use App\Http\Livewire\Productos;
use App\Http\Livewire\Usuarios;
use App\Http\Livewire\Ventas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->to('dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'admin'])->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('usuarios', Usuarios::class)->name('usuarios');
    Route::get('categorias', Categorias::class)->name('categorias');
    Route::get('productos', Productos::class)->name('productos');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('pos', Pos::class)->name('pos');
    Route::get('movimientos', Movimientos::class)->name('movimientos');
    Route::get('pagar-venta', PagarVenta::class)->name('pagar-venta');
    Route::get('ventas', Ventas::class)->name('ventas');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
