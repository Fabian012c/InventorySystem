<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorías - Sistema de Inventario</title>
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

        .alert-error {
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            color: #b91c1c;
        }

        .alert i {
            font-size: 1.4rem;
        }
        
        /* Color box para mostrar el color */
        .color-box {
            display: inline-block;
            width: 20px;
            height: 20px;
            border-radius: 4px;
            vertical-align: middle;
            margin-right: 8px;
            border: 1px solid rgba(0,0,0,0.1);
        }
        
        /* Icon preview */
        .icon-preview {
            display: inline-block;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--gray-light);
            text-align: center;
            line-height: 30px;
            margin-right: 10px;
        }
        
        /* Formulario de búsqueda */
        .search-form {
            margin-bottom: 1.5rem;
            display: flex;
            gap: 0.5rem;
        }
        
        .search-form input {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            border: 1px solid var(--gray-light);
            background-color: var(--light);
            font-size: 0.95rem;
            flex: 1;
            max-width: 400px;
        }
        
        .search-form button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.2s;
        }
        
        .search-form button:hover {
            background-color: var(--primary-dark);
        }
        
        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--gray);
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: var(--gray-light);
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
            
            .dashboard-content {
                padding: 1.5rem;
            }
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

        @media (max-width: 576px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .table-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .search-form {
                flex-direction: column;
            }
            
            .search-form input {
                max-width: none;
            }
            .user-name {
                display: none;
            }
        }
    /* Estilo profesional para el nombre de la categoría */
    .categoria-nombre-link {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: var(--primary-dark);
        text-decoration: none;
        font-size: 1.08rem;
        letter-spacing: 0.5px;
        transition: color 0.2s;
    }
    .categoria-nombre-link:hover {
        color: var(--primary);
        text-decoration: underline;
    }
    .categoria-nombre-icono {
        background: linear-gradient(135deg, #e0e7ff 60%, #f3f4f6 100%);
        border-radius: 8px;
        padding: 6px 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        box-shadow: 0 2px 6px rgba(37,99,235,0.07);
        margin-right: 2px;
    }
    .categoria-nombre-texto {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        font-size: 1.08rem;
        color: inherit;
        font-weight: 600;
        letter-spacing: 0.5px;
    }
    .categorias-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 1.18rem;
        font-weight: 700;
        color: var(--primary-dark);
        background: linear-gradient(90deg, #e0e7ff 60%, #f3f4f6 100%);
        padding: 8px 18px;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(37,99,235,0.06);
        letter-spacing: 0.5px;
        border-left: 4px solid var(--primary);
    }
    .categorias-title i {
        color: var(--primary);
        font-size: 1.3rem;
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
            <form action="{{ route('categorias.index') }}" method="GET" class="search-container">
                <i class="fas fa-search"></i>
                <input type="text" name="q" placeholder="Buscar categorías..." value="{{ request('q') }}">
            </form>
            <div class="user-info">
                <div class="user-avatar">PS</div>
                <div class="user-name">Psiconauta</div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="dashboard-content">
            @yield('content')
        </div>
    </div>


    <script>
        function exportTable() {
            Swal.fire({
                title: 'Exportar datos',
                text: 'Seleccione el formato de exportación',
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Excel',
                cancelButtonText: 'PDF',
                showDenyButton: true,
                denyButtonText: 'CSV'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire('Exportado!', 'Los datos se exportaron en formato Excel', 'success');
                } else if (result.isDenied) {
                    Swal.fire('Exportado!', 'Los datos se exportaron en formato CSV', 'success');
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire('Exportado!', 'Los datos se exportaron en formato PDF', 'success');
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
