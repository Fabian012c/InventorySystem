<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();

        $stats = [
            'total_productos' => Producto::count(),
            'stock_total' => Producto::sum('cantidad'),
            'bajo_stock' => Producto::whereColumn('cantidad', '<', 'stock_minimo')->count(),
            'agotados' => Producto::where('cantidad', 0)->count(),
        ];

        $lowStockProducts = Producto::whereColumn('cantidad', '<', 'stock_minimo')->get();

        return view('productos.index', compact('productos', 'categorias', 'stats', 'lowStockProducts'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'precio' => 'required|numeric|min:0',
        ], [
            'categoria_id.exists' => 'La categoría seleccionada no es válida.'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_error', 'producto');
        }

        $data = $request->all();
        $data['codigo'] = 'PROD-' . Str::upper(Str::random(8));

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('productos', 'public');
            $data['imagen'] = $path;
        }

        Producto::create($data);

        return redirect()->route('dashboard.index')
            ->with('success', 'Producto añadido exitosamente.');
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('edit_product_id', $id);
        }

        $data = $request->except('imagen');

        if ($request->hasFile('imagen')) {
            if ($producto->imagen && Storage::disk('public')->exists($producto->imagen)) {
                Storage::disk('public')->delete($producto->imagen);
            }
            $path = $request->file('imagen')->store('productos', 'public');
            $data['imagen'] = $path;
        }

        $producto->update($data);

        return redirect()->route('dashboard.index')
            ->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect()->route('dashboard.index')
            ->with('success', 'Producto eliminado correctamente.');
    }

    public function getProducto($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return response()->json($producto);
    }

    public function restock(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $producto = Producto::findOrFail($id);
        $producto->cantidad += $request->cantidad;
        $producto->save();

        return response()->json([
            'success' => true,
            'message' => 'Stock actualizado correctamente'
        ]);
    }
}
