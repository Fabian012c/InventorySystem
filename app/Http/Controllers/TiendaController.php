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
        $nav_categorias = Categoria::all();
        return view('tienda.index', compact('productos', 'nav_categorias'));
    }

    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        $nav_categorias = Categoria::all();
        return view('tienda.show', compact('producto', 'nav_categorias'));
    }

    public function categoria(Categoria $categoria)
    {
        // Cargar los productos para la categoría dada que tengan stock
        $productos = $categoria->productos()->where('cantidad', '>', 0)->get();
        
        $nav_categorias = Categoria::all();
        
        return view('tienda.categoria', compact('categoria', 'productos', 'nav_categorias'));
    }

    public function todasLasCategorias(Request $request)
    {
        $query = Categoria::query();

        if ($request->filled('q')) {
            $query->where('nombre', 'like', '%' . $request->q . '%');
        }

        $categorias = $query->get();
        return view('tienda.categorias', ['nav_categorias' => $categorias, 'categorias' => $categorias]);
    }

    public function ofertas(Request $request)
    {
        $query = Producto::onSale()->with('categoria');

        if ($request->get('sort') == 'precio_asc') {
            $query->orderBy('precio_oferta', 'asc');
        } elseif ($request->get('sort') == 'precio_desc') {
            $query->orderBy('precio_oferta', 'desc');
        }

        $productos = $query->paginate(12);
        $nav_categorias = Categoria::all();

        return view('tienda.ofertas', compact('productos', 'nav_categorias'));
    }

    public function nosotros()
    {
        $nav_categorias = Categoria::all();
        return view('tienda.nosotros', compact('nav_categorias'));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');
        
        $productos = Producto::with('categoria')
            ->where('nombre', 'LIKE', "%{$query}%")
            ->orWhere('descripcion', 'LIKE', "%{$query}%")
            ->paginate(12);
            
        $nav_categorias = Categoria::all();

        $productos->appends(['q' => $query]);

        return view('tienda.buscar', compact('productos', 'nav_categorias', 'query'));
    }
}