<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\TiendaController;


// Dashboard principal
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/buscar', [DashboardController::class, 'buscar'])->name('dashboard.buscar');

// Rutas para productos
Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::get('/productos/{producto}/editar', [ProductoController::class, 'getProducto'])->name('productos.get');
Route::post('/productos/{producto}/restock', [ProductoController::class, 'restock'])->name('productos.restock');
Route::get('/categorias/{id}/productos', [CategoriaController::class, 'mostrarProductos'])->name('categorias.productos');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');


// Rutas para categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');
Route::get('/categorias/{categoria}/editar', [CategoriaController::class, 'getCategoria'])->name('categorias.get');

// Rutas para Tienda
Route::get('/tienda', [TiendaController::class, 'index'])->name('tienda.index');
Route::get('/tienda/producto/{id}', [TiendaController::class, 'show'])->name('tienda.producto');
