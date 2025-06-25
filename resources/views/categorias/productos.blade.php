<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría - Sistema de Inventario</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #2563eb
            color: #333;
            line-height: 1.6;
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .section-title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .section-title i {
            color: #3498db;
            font-size: 28px;
        }

        .breadcrumb {
            font-size: 14px;
            color: #7f8c8d;
            margin-top: 5px;
        }

        .breadcrumb a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        .breadcrumb a:hover {
            color: #2980b9;
        }

        .dashboard-content {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
        }

        .category-info {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #3498db;
        }

        .category-icon {
            width: 50px;
            height: 50px;
            background: #e3f2fd;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-icon i {
            font-size: 24px;
            color: #3498db;
        }

        .category-details h2 {
            font-size: 20px;
            font-weight: 600;
            color: #2c3e50;
        }

        .category-stats {
            display: flex;
            gap: 15px;
            margin-top: 8px;
        }

        .stat-box {
            background: #e3f2fd;
            padding: 8px 15px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
        }

        .stat-box i {
            margin-right: 5px;
            color: #3498db;
        }

        .empty-state {
            text-align: center;
            padding: 50px 20px;
            background: #f8f9fa;
            border-radius: 8px;
            margin: 20px 0;
        }

        .empty-state i {
            font-size: 60px;
            color: #bdc3c7;
            margin-bottom: 20px;
        }

        .empty-state p {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 25px;
        }

        .btn-add-product {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-add-product:hover {
            background: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(52, 152, 219, 0.3);
        }

        .table-container {
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        thead {
            background: #3498db;
            color: white;
        }

        th {
            padding: 16px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 15px;
        }

        th:first-child {
            border-top-left-radius: 8px;
        }

        th:last-child {
            border-top-right-radius: 8px;
        }

        tbody tr {
            border-bottom: 1px solid #eee;
            transition: background 0.2s;
        }

        tbody tr:hover {
            background: #f8fafd;
        }

        td {
            padding: 15px;
            color: #2c3e50;
            font-size: 14.5px;
        }

        .status-indicator {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .status-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            display: inline-block;
        }

        .status-good {
            background-color: #2ecc71;
        }

        .status-warning {
            background-color: #f39c12;
        }

        .status-critical {
            background-color: #e74c3c;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-btn {
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .btn-view {
            background: #3498db;
        }

        .btn-edit {
            background: #f39c12;
        }

        .btn-delete {
            background: #e74c3c;
        }

        .product-image {
            width: 50px;
            height: 50px;
            border-radius: 8px;
            object-fit: cover;
            background: #f0f4f8;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7f8c8d;
        }

        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            gap: 8px;
        }

        .pagination button {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            border: 1px solid #ddd;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .pagination button:hover, .pagination button.active {
            background: #3498db;
            color: white;
            border-color: #3498db;
        }

        .footer {
            text-align: center;
            padding: 20px;
            color: #7f8c8d;
            font-size: 14px;
            border-top: 1px solid #eee;
            margin-top: 30px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .dashboard-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .section-title {
                font-size: 20px;
            }
            
            .dashboard-content {
                padding: 20px 15px;
            }
            
            .category-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .category-stats {
                flex-wrap: wrap;
            }
            
            th, td {
                padding: 12px 10px;
            }
        }

        @media (max-width: 480px) {
            .section-title {
                font-size: 18px;
            }
            
            .category-details h2 {
                font-size: 18px;
            }
            
            .empty-state {
                padding: 30px 15px;
            }
            
            .empty-state i {
                font-size: 48px;
            }
        }
    </style>
</head>
<body>
<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header" style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h1 class="section-title">
            <i class="fas fa-box"></i> Productos de "{{ $categoria->nombre }}"
        </h1>
        <a href="{{ route('productos.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>

    <!-- Breadcrumb -->
    <div class="breadcrumb" style="margin-bottom: 1.5rem; color: #6b7280;">
        <a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i> Inicio</a> /
        <a href="{{ route('categorias.index') }}">Categorías</a> /
        <span>{{ $categoria->nombre }}</span>
    </div>

    <!-- Información de la categoría -->
    <div class="category-info" style="display: flex; align-items: center; margin-bottom: 2rem;">
        <div class="category-icon" style="font-size: 2.5rem; margin-right: 1rem;">
            <i class="{{ $categoria->icono }}"></i>
        </div>
        <div class="category-details">
            <h2>Categoría: {{ $categoria->nombre }}</h2>
            <div class="category-stats" style="margin-top: 0.5rem;">
                <span style="margin-right: 1.5rem;"><i class="fas fa-boxes"></i> {{ $categoria->productos->count() }} productos</span>
                <span><i class="fas fa-layer-group"></i> {{ $categoria->subcategorias ?? 0 }} subcategorías</span>
            </div>
        </div>
    </div>

    <!-- Productos -->
    @if ($categoria->productos->count())
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Código</th>
                        <th>Cantidad</th>
                        <th>Stock mínimo</th>
                        <th>Estado</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria->productos as $producto)
                        <tr>
                            <td>
                                <div style="display: flex; align-items: center; gap: 12px;">
                                    <div class="product-image">
                                        <i class="fas fa-{{ $producto->icono ?? 'box' }}"></i>
                                    </div>
                                    <div>
                                        <div style="font-weight: 500;">{{ $producto->nombre }}</div>
                                        <div style="font-size: 13px; color: #7f8c8d;">ID: {{ $producto->codigo }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->cantidad }}</td>
                            <td>{{ $producto->stock_minimo }}</td>
                            <td>
                                @php
                                    $estado = $producto->cantidad >= $producto->stock_minimo ? 'good' :
                                              ($producto->cantidad > 0 ? 'warning' : 'critical');
                                    $estadoTexto = $estado === 'good' ? 'En stock' :
                                                   ($estado === 'warning' ? 'Bajo stock' : 'Sin stock');
                                @endphp
                                <div class="status-indicator">
                                    <span class="status-dot status-{{ $estado }}"></span> {{ $estadoTexto }}
                                </div>
                            </td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>
                                <div class="action-buttons" style="display: flex; gap: 8px;">
                                    {{-- Reemplaza show y edit por tus rutas --}}
                                    {{-- Si no tienes show, puedes eliminar esta línea --}}
                                    {{-- <a class="btn btn-outline" href="{{ route('productos.show', $producto->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a> --}}
                                    <a class="btn btn-outline" href="{{ route('productos.get', $producto->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form method="POST" action="{{ route('productos.destroy', $producto->id) }}" onsubmit="return confirm('¿Eliminar producto?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline" style="color: red;">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-box-open"></i>
            <p>No hay productos registrados en esta categoría.</p>
            <a href="{{ route('productos.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Agregar Producto
            </a>
        </div>
    @endif

    <div class="footer" style="margin-top: 2rem; color: #999; text-align: center;">
        Sistema de Inventario &copy; 2025 - Todos los derechos reservados
    </div>
</div>


    <script>
        // Simulación de funcionalidad para los botones de acción
        document.querySelectorAll('.action-btn').forEach(button => {
            button.addEventListener('click', function() {
                const action = this.classList[1]; // btn-view, btn-edit, o btn-delete
                const productRow = this.closest('tr');
                const productName = productRow.querySelector('td:first-child div:nth-child(2) > div:first-child').textContent;
                
                switch(action) {
                    case 'btn-view':
                        alert(`Ver detalles de: ${productName}`);
                        break;
                    case 'btn-edit':
                        alert(`Editar producto: ${productName}`);
                        break;
                    case 'btn-delete':
                        if(confirm(`¿Está seguro de eliminar el producto: ${productName}?`)) {
                            productRow.style.opacity = '0.5';
                            setTimeout(() => {
                                productRow.style.display = 'none';
                            }, 300);
                        }
                        break;
                }
            });
        });
        
        // Botón para agregar nuevo producto
        document.querySelector('.btn-add-product').addEventListener('click', function() {
            alert('Agregar nuevo producto');
        });
    </script>
</body>
</html>