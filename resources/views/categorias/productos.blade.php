<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría | InventarioPro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #10b981;
            --warning: #f59e0b;
            --danger: #ef4444;
            --light: #f9fafb;
            --dark: #1f2937;
            --gray: #6b7280;
            --gray-light: #e5e7eb;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.05), 0 1px 3px rgba(0, 0, 0, 0.1);
            --sidebar-width: 260px;
            --header-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: var(--dark);
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--primary-dark), var(--primary));
            color: white;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1000;
        }

        .sidebar-header {
            padding: 1.5rem 1rem;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .sidebar-header h2 {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 700;
            font-size: 1.3rem;
        }

        .sidebar-header i {
            font-size: 1.8rem;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
        }

        .menu-item {
            display: flex;
            align-items: center;
            padding: 0.9rem 1.5rem;
            margin: 0.3rem 0.8rem;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            gap: 12px;
            color: white;
            text-decoration: none;
        }

        .menu-item:hover, .menu-item.active {
            background-color: rgba(255, 255, 255, 0.15);
        }

        .menu-item i {
            font-size: 1.2rem;
            width: 24px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s;
        }

        /* Header */
        .header {
            height: var(--header-height);
            background-color: white;
            box-shadow: var(--card-shadow);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .search-container {
            flex: 1;
            max-width: 500px;
            position: relative;
        }

        .search-container input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 2.8rem;
            border-radius: 8px;
            border: 1px solid var(--gray-light);
            background-color: var(--light);
            font-size: 0.95rem;
        }

        .search-container i {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: 1.5rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .user-name {
            font-weight: 500;
        }

        /* Dashboard Content */
        .dashboard-content {
            padding: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-title i {
            color: var(--primary);
        }

        .btn {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
        }

        .btn-outline {
            background: none;
            border: 1px solid var(--gray-light);
            color: var(--dark);
        }

        .btn-outline:hover {
            background-color: var(--light);
        }

        /* Category Info */
        .category-info {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            border-left: 4px solid var(--primary);
        }

        .category-icon {
            width: 3.5rem;
            height: 3.5rem;
            background-color: rgba(37, 99, 235, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .category-icon i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .category-details h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 0.5rem;
        }

        .category-stats {
            display: flex;
            gap: 1.5rem;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            color: var(--gray);
        }

        .stat-item i {
            color: var(--primary);
        }

        /* Products Table */
        .products-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-light);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .card-title {
            font-size: 1.125rem;
            font-weight: 600;
            color: var(--dark);
        }

        .card-body {
            padding: 1.5rem;
        }

        .table-responsive {
            overflow-x: auto;
            border-radius: var(--border-radius);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .table thead {
            background-color: var(--primary);
            color: white;
        }

        .table th {
            padding: 1rem 1.25rem;
            text-align: left;
            font-weight: 500;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .table th:first-child {
            border-top-left-radius: 8px;
        }

        .table th:last-child {
            border-top-right-radius: 8px;
        }

        .table tbody tr {
            border-bottom: 1px solid var(--gray-light);
            transition: background-color 0.2s;
        }

        .table tbody tr:last-child {
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: var(--light);
        }

        .table td {
            padding: 1rem 1.25rem;
            color: var(--gray-700);
            font-size: 0.875rem;
            vertical-align: middle;
        }

        /* Product Cell */
        .product-cell {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .product-image {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 8px;
            background-color: var(--gray-light);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .product-image i {
            color: var(--gray);
            font-size: 1.25rem;
        }

        .product-info h5 {
            font-weight: 500;
            color: var(--dark);
            margin-bottom: 0.25rem;
        }

        .product-info small {
            font-size: 0.75rem;
            color: var(--gray);
        }

        /* Status */
        .status {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.375rem 0.75rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-dot {
            width: 0.5rem;
            height: 0.5rem;
            border-radius: 50%;
            display: inline-block;
        }

        .status-success {
            background-color: rgba(16, 185, 129, 0.1);
            color: var(--secondary);
        }

        .status-success .status-dot {
            background-color: var(--secondary);
        }

        .status-warning {
            background-color: rgba(245, 158, 11, 0.1);
            color: var(--warning);
        }

        .status-warning .status-dot {
            background-color: var(--warning);
        }

        .status-danger {
            background-color: rgba(239, 68, 68, 0.1);
            color: var(--danger);
        }

        .status-danger .status-dot {
            background-color: var(--danger);
        }

        /* Actions */
        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .action-btn {
            width: 2rem;
            height: 2rem;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .action-btn i {
            font-size: 0.875rem;
        }

        .btn-edit {
            background-color: var(--warning);
        }

        .btn-delete {
            background-color: var(--danger);
        }

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 3rem 2rem;
            background-color: var(--light);
            border-radius: 8px;
            margin: 1rem 0;
        }

        .empty-state i {
            font-size: 3.5rem;
            color: var(--gray-light);
            margin-bottom: 1.5rem;
        }

        .empty-state h4 {
            font-size: 1.25rem;
            color: var(--gray);
            margin-bottom: 1rem;
        }

        .empty-state p {
            color: var(--gray);
            margin-bottom: 1.5rem;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 1.5rem;
            color: var(--gray);
            font-size: 0.875rem;
            border-top: 1px solid var(--gray-light);
            margin-top: 2rem;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                overflow: visible;
            }
            
            .sidebar-header h2 span, .menu-item span {
                display: none;
            }
            
            .main-content {
                margin-left: 70px;
            }
            
            .header {
                padding: 0 1rem;
            }
            
            .user-name {
                display: none;
            }

            .category-info {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .category-stats {
                flex-wrap: wrap;
            }
        }

        @media (max-width: 576px) {
            .dashboard-content {
                padding: 1.5rem 1rem;
            }
            
            .table th, .table td {
                padding: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-boxes"></i> <span>InventarioPro</span></h2>
        </div>
        <div class="sidebar-menu">
            <a href="{{ route('dashboard.index') }}" class="menu-item">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('productos.index') }}" class="menu-item">
                <i class="fas fa-tags"></i>
                <span>Agregar P/C</span>
            </a>            
            <a href="{{ route('categorias.index') }}" class="menu-item">
                <i class="fas fa-list"></i>
                <span>Categorías</span>
            </a>
            <a href="#" class="menu-item active">
                <i class="fas fa-plus-circle"></i>
                <span>Productos</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fas fa-store"></i>
                <span>Tienda</span>
            </a>
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Reportes</span>
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <header class="header">
            <div class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" placeholder="Buscar productos...">
            </div>
              <div class="user-info">
                <div class="user-avatar">PS</div>
                <div class="user-name">Psiconauta</div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h1 class="section-title">
                <i class="fas fa-box"></i> Productos de "{{ $categoria->nombre }}"
            </h1>

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i> Inicio</a>
                <span class="separator">/</span>
                <a href="{{ route('categorias.index') }}">Categorías</a>
                <span class="separator">/</span>
                <span>{{ $categoria->nombre }}</span>
            </div>

            <!-- Category Info -->
            <div class="category-info">
                <div class="category-icon">
                    <i class="{{ $categoria->icono }}"></i>
                </div>
                <div class="category-details">
                    <h2>Categoría: {{ $categoria->nombre }}</h2>
                    <div class="category-stats">
                        <div class="stat-item">
                            <i class="fas fa-box"></i> {{ $categoria->productos->count() }} productos
                        </div>
                        <div class="stat-item">
                            <i class="fas fa-layer-group"></i> {{ $categoria->subcategorias ?? 0 }} subcategorías
                        </div>
                    </div>
                </div>
            </div>

            <!-- Products Table -->
            <div class="products-card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Productos</h3>
                    <a href="{{ route('productos.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Nuevo Producto
                    </a>
                </div>
                <div class="card-body">
                    @if ($categoria->productos->count())
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Mínimo</th>
                                        <th>Estado</th>
                                        <th>Descripción</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoria->productos as $producto)
                                        <tr>
                                            <td>
                                                <div class="product-cell">
                                                    <div class="product-image">
                                                        <i class="fas fa-{{ $producto->icono ?? 'box' }}"></i>
                                                    </div>
                                                    <div class="product-info">
                                                        <h5>{{ $producto->nombre }}</h5>
                                                        <small>ID: {{ $producto->id }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $producto->codigo }}</td>
                                            <td>{{ $producto->cantidad }}</td>
                                            <td>{{ $producto->stock_minimo }}</td>
                                            <td>
                                                @php
                                                    $estado = $producto->cantidad >= $producto->stock_minimo ? 'success' :
                                                              ($producto->cantidad > 0 ? 'warning' : 'danger');
                                                    $estadoTexto = $estado === 'success' ? 'En stock' :
                                                                   ($estado === 'warning' ? 'Bajo stock' : 'Sin stock');
                                                @endphp
                                                <span class="status status-{{ $estado }}">
                                                    <span class="status-dot"></span> {{ $estadoTexto }}
                                                </span>
                                            </td>
                                            <td>{{ Str::limit($producto->descripcion, 30) }}</td>
                                            <td>
                                                <div class="actions">
                                                    <a href="{{ route('productos.get', $producto->id) }}" class="action-btn btn-edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form method="POST" action="{{ route('productos.destroy', $producto->id) }}" onsubmit="return confirm('¿Está seguro de eliminar este producto?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="action-btn btn-delete">
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
                            <h4>No hay productos registrados</h4>
                            <p>No se encontraron productos en esta categoría. Puedes agregar uno nuevo haciendo clic en el botón a continuación.</p>
                            <a href="{{ route('productos.create', ['categoria_id' => $categoria->id]) }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Agregar Producto
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="footer">
                Sistema de InventarioPro &copy; {{ date('Y') }} - Todos los derechos reservados
            </div>
        </div>
    </div>

    <script>
        // Funcionalidad adicional puede ir aquí
        document.addEventListener('DOMContentLoaded', function() {
            // Ejemplo: Resaltar fila al pasar el mouse
            const rows = document.querySelectorAll('.table tbody tr');
            rows.forEach(row => {
                row.addEventListener('mouseenter', () => {
                    row.style.backgroundColor = '#f8f9fa';
                });
                row.addEventListener('mouseleave', () => {
                    row.style.backgroundColor = '';
                });
            });
            
            // Ejemplo: Confirmación antes de eliminar
            const deleteButtons = document.querySelectorAll('.btn-delete');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (!confirm('¿Está seguro de eliminar este producto?')) {
                        e.preventDefault();
                    }
                });
            });
        });
    </script>
</body>
</html>