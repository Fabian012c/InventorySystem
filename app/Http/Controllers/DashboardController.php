<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class DashboardController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with(['productos' => function($query) {
            $query->orderBy('nombre');
        }])->withCount('productos')->get();

        $stats = [
            'total_productos' => Producto::count(),
            'stock_total' => Producto::sum('cantidad'),
            'bajo_stock' => Producto::whereColumn('cantidad', '<', 'stock_minimo')->count(),
            'agotados' => Producto::where('cantidad', 0)->count(),
        ];

        $lowStockProducts = Producto::whereColumn('cantidad', '<', 'stock_minimo')->get();

        // Preparar datos para gráfico: nombres y totales por categoría
        $chartData = $categorias->map(function($categoria) {
            return [
                'nombre' => $categoria->nombre,
                'stock_total' => $categoria->productos->sum('cantidad'),
            ];
        });

        $chartLabels = $chartData->pluck('nombre')->toArray();
        $chartValues = $chartData->pluck('stock_total')->toArray();

        // También puedes preparar topProducts para el segundo gráfico
        $topProducts = Producto::orderBy('cantidad', 'desc')->take(10)->get();

        return view('dashboard', compact(
            'categorias',
            'stats',
            'lowStockProducts',
            'chartLabels',
            'chartValues',
            'topProducts'
        ));
    }

    public function buscar(Request $request)
    {
        $query = $request->input('q');

        $productos = Producto::with('categoria')
            ->where('nombre', 'like', "%{$query}%")
            ->orWhere('descripcion', 'like', "%{$query}%")
            ->get();

        $categorias = Categoria::all();

        $stats = [
            'total_productos' => Producto::count(),
            'stock_total' => Producto::sum('cantidad'),
            'bajo_stock' => Producto::whereColumn('cantidad', '<', 'stock_minimo')->count(),
            'agotados' => Producto::where('cantidad', 0)->count(),
        ];

        $lowStockProducts = Producto::whereColumn('cantidad', '<', 'stock_minimo')->get();

        return view('dashboard', compact('productos', 'categorias', 'stats', 'lowStockProducts'));
    }
}
