<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Inventario | Gestión por Categorías</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        /* Formularios */
        .form-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .form-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .form-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .form-header {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 1.5rem;
        }

        .form-title {
            font-size: 1.1rem;
            font-weight: 600;
        }

        .form-header i {
            font-size: 1.5rem;
            color: var(--primary);
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
        }

        .form-row .form-group {
            flex: 1;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--dark);
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--gray-light);
            background-color: var(--light);
            font-size: 0.95rem;
            transition: border-color 0.2s;
        }

        .form-control:focus {
            outline: none;
            border-color: var(--primary);
        }

        textarea.form-control {
            min-height: 80px;
            resize: vertical;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%236b7280' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
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

        .btn-block {
            display: block;
            width: 100%;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .stat-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            display: flex;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1.2rem;
            font-size: 1.8rem;
        }

        .stat-info {
            flex: 1;
        }

        .stat-title {
            font-size: 0.95rem;
            color: var(--gray);
            margin-bottom: 0.3rem;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.2rem;
        }

        /* Categorías */
        .categories-container {
            margin-top: 2rem;
        }

        .categories-header {
            margin-bottom: 1.5rem;
        }

        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .category-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        }

        .category-header {
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--gray-light);
        }

        .category-title {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
        }

        .category-title i {
            font-size: 1.2rem;
        }

        .category-actions {
            display: flex;
            gap: 8px;
        }

        .category-actions button {
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            transition: color 0.2s;
        }

        .category-actions button:hover {
            color: var(--primary);
        }

        .products-list {
            padding: 1rem;
        }

        .product-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .product-item:last-child {
            border-bottom: none;
        }

        .product-info {
            flex: 1;
        }

        .product-name {
            font-weight: 500;
            margin-bottom: 0.3rem;
        }

        .product-stock {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.85rem;
            color: var(--gray);
        }

        .stock-indicator {
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .stock-normal {
            background-color: var(--secondary);
        }

        .stock-low {
            background-color: var(--warning);
        }

        .product-actions {
            display: flex;
            gap: 8px;
        }

        .empty-category {
            text-align: center;
            padding: 2rem;
            color: var(--gray);
        }

        /* Alertas */
        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .alert-success {
            background-color: #d1fae5;
            border-left: 4px solid #10b981;
            color: #065f46;
        }

        .alert-error {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
        }

        .alert i {
            font-size: 1.4rem;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            width: 90%;
            max-width: 600px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .modal-header button {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--gray);
        }

        .modal-header button:hover {
            color: var(--dark);
        }

        /* Responsive */
        @media (max-width: 992px) {
            .form-section {
                grid-template-columns: 1fr;
            }
        }

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
        }

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-content {
                padding: 1.5rem 1rem;
            }
            
            .form-row {
                flex-direction: column;
                gap: 0;
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
            <a href="{{ route('tienda.index') }}" class="menu-item">
                <i class="fas fa-store"></i>
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
        <div class="header">
            <form action="{{ route('dashboard.buscar') }}" method="GET" class="search-container">
                @csrf
                <i class="fas fa-search"></i>
                <input type="text" name="q" placeholder="Buscar productos, categorías..." value="{{ request('q') }}">
            </form>
            <div class="user-info">
                <div class="user-avatar">PS</div>
                <div class="user-name">Psiconauta</div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h1 class="section-title"><i class="fas fa-box"></i> Gestión de Productos por Categorías</h1>
            
            <!-- Alertas -->
            @if(session('success'))
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i>
                    <div>{{ session('success') }}</div>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>{{ session('error') }}</div>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-error">
                    <i class="fas fa-exclamation-circle"></i>
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            
            <!-- Formularios -->
            <div class="form-section">
                <!-- Formulario para añadir producto -->
                <div class="form-card">
                    <div class="form-header">
                        <i class="fas fa-plus-circle"></i>
                        <h3 class="form-title">Añadir Nuevo Producto</h3>
                    </div>
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="productName">Nombre del Producto</label>
                            <input type="text" id="productName" name="nombre" class="form-control" placeholder="Ej: Laptop Pro 15" value="{{ old('nombre') }}" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="productQuantity">Cantidad</label>
                                <input type="number" id="productQuantity" name="cantidad" class="form-control" placeholder="0" min="0" value="{{ old('cantidad', 0) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="productMinStock">Stock Mínimo</label>
                                <input type="number" id="productMinStock" name="stock_minimo" class="form-control" placeholder="0" min="0" value="{{ old('stock_minimo', 10) }}" required>
                            </div>
                            <div class="form-group">
                                <label for="productPrice">Precio</label>
                                <input type="number" id="productPrice" name="precio" class="form-control" placeholder="0.00" min="0" step="0.01" value="{{ old('precio') }}" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="productCategory">Categoría</label>
                            <select id="productCategory" name="categoria_id" class="form-control" required>
                                <option value="">Selecciona una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen del Producto</label>
                            <input type="file" id="imagen" name="imagen" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="productDescription">Descripción (Opcional)</label>
                            <textarea id="productDescription" name="descripcion" class="form-control" rows="2" placeholder="Descripción del producto">{{ old('descripcion') }}</textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Añadir Producto
                        </button>
                    </form>
                </div>
                
                <!-- Formulario para crear categoría -->
                <div class="form-card">
                    <div class="form-header">
                        <i class="fas fa-folder-plus"></i>
                        <h3 class="form-title">Crear Nueva Categoría</h3>
                    </div>
                    <form action="{{ route('categorias.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="categoryName">Nombre de la Categoría</label>
                            <input type="text" id="categoryName" name="nombre" class="form-control" placeholder="Ej: Electrónicos" value="{{ old('nombre') }}" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="categoryColor">Color de Identificación</label>
                            <input type="hidden" id="selectedColor" name="color" value="{{ old('color', '#3b82f6') }}">
                            <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                                @foreach(['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899'] as $color)
                                    <div style="width: 30px; height: 30px; border-radius: 50%; background: {{ $color }}; cursor: pointer; {{ old('color', '#3b82f6') == $color ? 'border: 2px solid #1e293b;' : '' }}" data-color="{{ $color }}"></div>
                                @endforeach
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="categoryIcon">Icono</label>
                            <select id="categoryIcon" name="icono" class="form-control" required>
                                <option value="">Selecciona un icono</option>
                                <option value="fas fa-laptop" {{ old('icono') == 'fas fa-laptop' ? 'selected' : '' }}>💻 Computadora</option>
                                <option value="fas fa-mobile-alt" {{ old('icono') == 'fas fa-mobile-alt' ? 'selected' : '' }}>📱 Teléfono</option>
                                <option value="fas fa-tshirt" {{ old('icono') == 'fas fa-tshirt' ? 'selected' : '' }}>👕 Ropa</option>
                                <option value="fas fa-book" {{ old('icono') == 'fas fa-book' ? 'selected' : '' }}>📚 Libro</option>
                                <option value="fas fa-home" {{ old('icono') == 'fas fa-home' ? 'selected' : '' }}>🏠 Hogar</option>
                                <option value="fas fa-futbol" {{ old('icono') == 'fas fa-futbol' ? 'selected' : '' }}>⚽ Deportes</option>
                            </select>
                        </div>
                        
                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-plus"></i> Crear Categoría
                        </button>
                    </form>
                </div>
            </div>
            
            <!-- Estadísticas -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #dbeafe; color: #3b82f6;">
                        <i class="fas fa-boxes"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Total Productos</div>
                        <div class="stat-value">{{ $stats['total_productos'] }}</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #dcfce7; color: #22c55e;">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Stock Total</div>
                        <div class="stat-value">{{ $stats['stock_total'] }}</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #fef3c7; color: #f59e0b;">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Productos con bajo stock</div>
                        <div class="stat-value">{{ $stats['bajo_stock'] }}</div>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon" style="background-color: #fee2e2; color: #ef4444;">
                        <i class="fas fa-times-circle"></i>
                    </div>
                    <div class="stat-info">
                        <div class="stat-title">Agotados</div>
                        <div class="stat-value">{{ $stats['agotados'] }}</div>
                    </div>
                </div>
            </div>
            
            <!-- Categorías y Productos -->
            <div class="categories-container">
                <div class="categories-header">
                    <h2 class="section-title"><i class="fas fa-folder"></i> Categorías de Productos</h2>
                </div>
                
                <div class="category-grid">
                    @forelse($categorias as $categoria)
                        <div class="category-card">
                            <div class="category-header" style="background-color: {{ $categoria->color }}20;">
                                <div class="category-title">
                                    @if($categoria->icono)
                                        <i class="{{ $categoria->icono }}"></i>
                                    @endif
                                    <span>{{ $categoria->nombre }}</span>
                                </div>
                                <div class="category-actions">
                                    <button title="Editar categoría" onclick="editarCategoria({{ $categoria->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" title="Eliminar categoría" onclick="return confirm('¿Estás seguro?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="products-list">
                                @forelse($categoria->productos as $producto)
                                    <div class="product-item">
                                        <div class="product-info">
                                            <div class="product-name">{{ $producto->nombre }}</div>
                                            <div class="product-stock">
                                                @php
                                                    $stockClass = $producto->cantidad < $producto->stock_minimo ? 'stock-low' : 'stock-normal';
                                                @endphp
                                                <span class="stock-indicator {{ $stockClass }}"></span>
                                                <span>Stock: {{ $producto->cantidad }} (Mín: {{ $producto->stock_minimo }})</span>
                                            </div>
                                        </div>
                                        <div class="product-actions">
                                            <button class="btn btn-outline" title="Editar" onclick="editarProducto({{ $producto->id }})">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline" title="Eliminar" onclick="return confirm('¿Estás seguro?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @empty
                                    <div class="empty-category">
                                        <i class="fas fa-inbox" style="font-size: 2rem; margin-bottom: 1rem; color: #cbd5e1;"></i>
                                        <p>No hay productos en esta categoría</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    @empty
                        <div class="empty-category">
                            <i class="fas fa-exclamation-circle" style="font-size: 2rem; margin-bottom: 1rem; color: #cbd5e1;"></i>
                            <p>No hay categorías creadas</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para editar producto -->
    <div id="editProductModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="form-title">Editar Producto</h3>
                <button onclick="closeModal('editProductModal')">&times;</button>
            </div>
            <form id="editProductForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="editProductName">Nombre del Producto</label>
                    <input type="text" id="editProductName" name="nombre" class="form-control" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="editProductQuantity">Cantidad</label>
                        <input type="number" id="editProductQuantity" name="cantidad" class="form-control" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="editProductMinStock">Stock Mínimo</label>
                        <input type="number" id="editProductMinStock" name="stock_minimo" class="form-control" min="0" required>
                    </div>
                     <div class="form-group">
                        <label for="editProductPrice">Precio</label>
                        <input type="number" id="editProductPrice" name="precio" class="form-control" placeholder="0.00" min="0" step="0.01" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="editProductCategory">Categoría</label>
                    <select id="editProductCategory" name="categoria_id" class="form-control" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="editProductDescription">Descripción</label>
                    <textarea id="editProductDescription" name="descripcion" class="form-control" rows="2"></textarea>
                </div>

                <div class="form-group">
                    <label>Imagen Actual</label>
                    <div>
                        <img id="currentProductImage" src="" alt="Imagen Actual" style="max-width: 100px; border-radius: 8px; margin-bottom: 10px;">
                    </div>
                    <label for="editProductImage">Cambiar Imagen (Opcional)</label>
                    <input type="file" id="editProductImage" name="imagen" class="form-control">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </form>
        </div>
    </div>

    <!-- Modal para editar categoría -->
    <div id="editCategoryModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="form-title">Editar Categoría</h3>
                <button onclick="closeModal('editCategoryModal')">&times;</button>
            </div>
            <form id="editCategoryForm" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="editCategoryName">Nombre de la Categoría</label>
                    <input type="text" id="editCategoryName" name="nombre" class="form-control" required>
                </div>
                
                <div class="form-group">
                    <label for="editCategoryColor">Color de Identificación</label>
                    <input type="hidden" id="editSelectedColor" name="color">
                    <div style="display: flex; gap: 10px; flex-wrap: wrap;">
                        @foreach(['#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ec4899'] as $color)
                            <div style="width: 30px; height: 30px; border-radius: 50%; background: {{ $color }}; cursor: pointer;" data-color="{{ $color }}"></div>
                        @endforeach
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="editCategoryIcon">Icono</label>
                    <select id="editCategoryIcon" name="icono" class="form-control" required>
                        <option value="">Selecciona un icono</option>
                        <option value="fas fa-laptop">💻 Computadora</option>
                        <option value="fas fa-mobile-alt">📱 Teléfono</option>
                        <option value="fas fa-tshirt">👕 Ropa</option>
                        <option value="fas fa-book">📚 Libro</option>
                        <option value="fas fa-home">🏠 Hogar</option>
                        <option value="fas fa-futbol">⚽ Deportes</option>
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </form>
        </div>
    </div>
    <script>
        // Función para editar un producto
        async function editarProducto(id) {
            try {
                // Obtener datos del producto
                const response = await fetch(`/productos/${id}/editar`);
                const producto = await response.json();
                
                // Llenar el formulario
                document.getElementById('editProductName').value = producto.nombre;
                document.getElementById('editProductQuantity').value = producto.cantidad;
                document.getElementById('editProductMinStock').value = producto.stock_minimo;
                document.getElementById('editProductPrice').value = producto.precio;
                document.getElementById('editProductDescription').value = producto.descripcion || '';
                document.getElementById('editProductCategory').value = producto.categoria_id;

                // Llenar la imagen actual
                const currentImage = document.getElementById('currentProductImage');
                if (producto.imagen) {
                    currentImage.src = `/storage/${producto.imagen}`;
                    currentImage.style.display = 'block';
                } else {
                    currentImage.style.display = 'none';
                }
                
                // Configurar la ruta del formulario
                document.getElementById('editProductForm').action = `/productos/${id}`;
                
                // Mostrar modal
                document.getElementById('editProductModal').style.display = 'flex';
            } catch (error) {
                console.error('Error al obtener el producto:', error);
                alert('Error al cargar el producto');
            }
        }

        // Función para editar una categoría
        async function editarCategoria(id) {
            try {
                // Obtener datos de la categoría
                const response = await fetch(`/categorias/${id}/editar`);
                const categoria = await response.json();
                
                // Llenar el formulario
                document.getElementById('editCategoryName').value = categoria.nombre;
                document.getElementById('editSelectedColor').value = categoria.color;
                document.getElementById('editCategoryIcon').value = categoria.icono;
                
                // Configurar la ruta del formulario
                document.getElementById('editCategoryForm').action = `/categorias/${id}`;
                
                // Mostrar modal
                document.getElementById('editCategoryModal').style.display = 'flex';
            } catch (error) {
                console.error('Error al obtener la categoría:', error);
                alert('Error al cargar la categoría');
            }
        }

        // Función para cerrar modales
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        // Selector de color en formulario de categoría
        document.querySelectorAll('[data-color]').forEach(color => {
            color.addEventListener('click', function() {
                const selectedColor = this.getAttribute('data-color');
                document.getElementById('selectedColor').value = selectedColor;
                
                // Actualizar la interfaz
                this.parentNode.querySelectorAll('[data-color]').forEach(el => {
                    el.style.border = 'none';
                });
                this.style.border = '2px solid #1e293b';
            });
        });

        // Selector de color en formulario de edición de categoría
        document.querySelectorAll('#editCategoryModal [data-color]').forEach(color => {
            color.addEventListener('click', function() {
                const selectedColor = this.getAttribute('data-color');
                document.getElementById('editSelectedColor').value = selectedColor;
                
                // Actualizar la interfaz
                this.parentNode.querySelectorAll('[data-color]').forEach(el => {
                    el.style.border = 'none';
                });
                this.style.border = '2px solid #1e293b';
            });
        });

        // Cerrar modales al hacer clic fuera del contenido
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        }
    </script>
</body>
</html>