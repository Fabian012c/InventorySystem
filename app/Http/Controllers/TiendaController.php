<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\Categoria;

class TiendaController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->where('cantidad', '>', 0)->get();
        return view('tienda.index', compact('productos'));
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return view('tienda.show', compact('producto'));
    }
}
