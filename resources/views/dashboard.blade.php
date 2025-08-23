<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Inventario</title>
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

        .app-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--primary);
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

        /* Charts */
        .charts-container {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 1.5rem;
            margin-bottom: 2.5rem;
        }

        .chart-card {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--dark);
        }

        .chart-wrapper {
            position: relative;
            height: 300px;
        }

        /* Tables */
        .table-container {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 1.5rem;
            margin-bottom: 2rem;
            overflow-x: auto;
        }

        .table-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 0.8rem 1rem;
            font-weight: 600;
            color: var(--gray);
            border-bottom: 1px solid var(--gray-light);
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid var(--gray-light);
        }

        .product-cell {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .product-avatar {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background-color: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary);
        }

        .status {
            padding: 0.4rem 0.8rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .status-in-stock {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-low-stock {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-out-of-stock {
            background-color: #fee2e2;
            color: #b91c1c;
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
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-left: 1.5rem;
        }
        .user-name {
            font-weight: 500;
        }
        .alert-error {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
        }

        .alert i {
            font-size: 1.4rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .charts-container {
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
        }
            .user-name {
                display: none;
            }
        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-content {
                padding: 1.5rem 1rem;
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
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            <h1 class="section-title"><i class="fas fa-tachometer-alt"></i> Panel de Control</h1>
            
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
            
            <!-- Stats Cards -->
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
            
            <!-- Charts Section -->
            <div class="charts-container">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">Distribución de Inventario por Categoría</div>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="inventoryChart"></canvas>
                    </div>
                </div>
                
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">Top Productos con Más Stock</div>
                    </div>
                    <div class="chart-wrapper">
                        <canvas id="topProductsChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Scatter Chart Section -->
            <div class="charts-container" style="grid-template-columns: 1fr;">
                <div class="chart-card">
                    <div class="chart-header">
                        <div class="chart-title">Análisis de Stock: Actual vs. Mínimo</div>
                    </div>
                    <div class="chart-wrapper" style="height: 350px;">
                        <canvas id="stockScatterChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Products Table -->
            <div class="table-container">
                <div class="table-header">
                    <div class="chart-title">Productos con Bajo Stock</div>
                    <button class="btn btn-outline" onclick="exportTable()">
                        <i class="fas fa-download"></i> Exportar
                    </button>
                </div>
                <table id="lowStockTable">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Stock Actual</th>
                            <th>Stock Mínimo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($lowStockProducts as $producto)
                            <tr>
                                <td>
                                    <div class="product-cell">
                                        <div class="product-avatar">
                                            @if($producto->categoria && $producto->categoria->icono)
                                                <i class="{{ $producto->categoria->icono }}"></i>
                                            @else
                                                <i class="fas fa-box"></i>
                                            @endif
                                        </div>
                                        <div>{{ $producto->nombre }}</div>
                                    </div>
                                </td>
                                <td>{{ $producto->categoria ? $producto->categoria->nombre : 'Sin categoría' }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->stock_minimo }}</td>
                                <td>
                                    @if($producto->cantidad == 0)
                                        <span class="status status-out-of-stock">Agotado</span>
                                    @else
                                        <span class="status status-low-stock">Bajo Stock</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('productos.restock', $producto->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-plus"></i> Reponer
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 2rem;">
                                    <i class="fas fa-check-circle" style="color: #10b981; font-size: 2rem; margin-bottom: 1rem;"></i>
                                    <p>¡Excelente! Todos los productos tienen suficiente stock.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Inventory Distribution Chart (Pie)
        const inventoryCtx = document.getElementById('inventoryChart').getContext('2d');
        const inventoryChart = new Chart(inventoryCtx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($chartLabels) !!},
                datasets: [{
                    data: {!! json_encode($chartValues) !!},
                    backgroundColor: [
                        '#3b82f6', '#10b981', '#f59e0b', '#8b5cf6', '#ef4444', '#64748b',
                        '#ec4899', '#0ea5e9', '#84cc16', '#f97316', '#8b5cf6', '#6366f1'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'right',
                        labels: {
                            boxWidth: 12,
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const label = context.label || '';
                                const value = context.raw || 0;
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = Math.round((value / total) * 100);
                                return `${label}: ${value} (${percentage}%)`;
                            }
                        }
                    }
                },
                cutout: '65%'
            }
        });
        
        // Top Products Chart (Bar)
        const topProductsCtx = document.getElementById('topProductsChart').getContext('2d');
        const topProductsChart = new Chart(topProductsCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($topProducts->pluck('nombre')) !!},
                datasets: [{
                    label: 'Unidades en Stock',
                    data: {!! json_encode($topProducts->pluck('cantidad')) !!},
                    backgroundColor: '#10b981',
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            drawBorder: false
                        },
                        title: {
                            display: true,
                            text: 'Cantidad'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return `Stock: ${context.raw}`;
                            }
                        }
                    }
                }
            }
        });

        // Scatter Plot - Stock vs. Min Stock
        const scatterCtx = document.getElementById('stockScatterChart').getContext('2d');
        const scatterChart = new Chart(scatterCtx, {
            type: 'scatter',
            data: {
                datasets: [{
                    label: 'Producto',
                    data: {!! json_encode($scatterData) !!},
                    backgroundColor: 'rgba(239, 68, 68, 0.7)',
                    borderColor: 'rgba(239, 68, 68, 1)',
                    pointRadius: 6,
                    pointHoverRadius: 8
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    x: {
                        type: 'linear',
                        position: 'bottom',
                        title: {
                            display: true,
                            text: 'Stock Mínimo'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Stock Actual'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                const point = context.raw;
                                return `${point.label}: (Mín: ${point.x}, Actual: ${point.y})`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>

    
    <!-- Cargar SheetJS para exportar Excel -->
    <script src="https://cdn.sheetjs.com/xlsx-0.19.3/package/dist/xlsx.full.min.js"></script>
</body>
</html>