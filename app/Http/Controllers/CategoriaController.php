<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CategoriaController extends Controller
{
    public function productos($id)
{
    $categoria = Categoria::with('productos')->findOrFail($id);

    return view('categorias.productos', compact('categoria'));
}

    public function index(Request $request)
    {
        $categorias = Categoria::with('productos')
            ->when($request->filled('q'), function ($query) use ($request) {
                $query->where('nombre', 'like', '%' . $request->q . '%');
            })
            ->get();

        return view('categorias.index', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255|unique:categorias',
            'color' => 'required|string|size:7|starts_with:#',
            'icono' => 'required|string',
        ], [
            'color.starts_with' => 'El color debe ser un código hexadecimal válido (ej: #3b82f6)',
            'nombre.unique' => 'Ya existe una categoría con este nombre'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('form_error', 'categoria');
        }

        Categoria::create([
            'nombre' => $request->nombre,
            'color' => $request->color,
            'icono' => $request->icono,
            'slug' => Str::slug($request->nombre),
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categorias')->ignore($categoria->id)
            ],
            'color' => 'required|string|size:7|starts_with:#',
            'icono' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('edit_categoria_id', $id);
        }

        $categoria->update([
            'nombre' => $request->nombre,
            'color' => $request->color,
            'icono' => $request->icono,
            'slug' => Str::slug($request->nombre),
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Categoría actualizada correctamente.');
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        
        // Verificar si la categoría tiene productos asociados
        if ($categoria->productos()->count() > 0) {
            return redirect()->route('dashboard.index')
                ->with('error', 'No se puede eliminar la categoría porque tiene productos asociados.');
        }

        $categoria->delete();

        return redirect()->route('dashboard.index')
            ->with('success', 'Categoría eliminada correctamente.');
    }

    public function getCategoria($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    public function mostrarProductos($id) 
    {
        $categoria = Categoria::with('productos')->findOrFail($id);
        $categorias = Categoria::all(); // Cargar todas las categorías
        return view('categorias.productos', compact('categoria', 'categorias'));
    }

}
