<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría: {{ $categoria->nombre }} | Premium Store</title>
    <meta name="description" content="Explora nuestros productos en la categoría {{ $categoria->nombre }}.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --primary-dark: #1a252f;
            --primary-light: #ecf0f1;
            --secondary: #e74c3c;
            --secondary-light: #fadbd8;
            --accent: #3498db;
            --accent-light: #d6eaf8;
            --warning: #f39c12;
            --warning-light: #fdebd0;
            --success: #27ae60;
            --success-light: #d5f5e3;
            --light: #ffffff;
            --dark: #2c3e50;
            --gray-dark: #7f8c8d;
            --gray: #bdc3c7;
            --gray-light: #ecf0f1;
            --gray-extra-light: #f9f9f9;
            --border-radius: 0.375rem;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            --box-shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
        }

        body {
            background-color: var(--gray-extra-light);
            color: var(--dark);
            line-height: 1.6;
        }

        /* Header */
        .header {
            background-color: var(--light);
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-light);
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .logo:hover {
            opacity: 0.9;
        }

        .logo-icon {
            width: 42px;
            height: 42px;
            background-color: var(--primary);
            color: white;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark);
            letter-spacing: -0.5px;
        }

        /* Navigation */
        .nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--gray-dark);
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
            font-size: 0.95rem;
            padding: 0.5rem 0;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--primary);
        }

        /* Icons */
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .icon-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--gray-dark);
            transition: var(--transition);
            position: relative;
        }

        .icon-link:hover {
            background-color: var(--gray-extra-light);
            color: var(--primary);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background-color: var(--secondary);
            color: white;
            border-radius: 50%;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        /* Main Content */
        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 1.5rem;
        }

        .section-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin-bottom: 2rem;
            color: var(--primary);
            text-align: center;
        }

        .section-title i {
            margin-right: 10px;
        }

        /* Products Grid */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        /* Product Card */
        .product-card {
            background-color: var(--light);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
            border: 1px solid var(--gray-light);
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-color: var(--accent-light);
        }

        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            padding: 0.35rem 0.85rem;
            border-radius: 2rem;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 10;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .badge-new {
            background-color: var(--success-light);
            color: var(--success);
        }

        .badge-sale {
            background-color: var(--secondary-light);
            color: var(--secondary);
        }

        .product-image-container {
            width: 100%;
            height: 220px;
            overflow: hidden;
            position: relative;
            background-color: var(--gray-extra-light);
        }

        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .product-details {
            padding: 1.5rem;
        }

        .product-category {
            color: var(--accent);
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            margin-bottom: 0.5rem;
            display: block;
            letter-spacing: 0.5px;
        }

        .product-title {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .product-description {
            color: var(--gray-dark);
            font-size: 0.875rem;
            margin-bottom: 1rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            min-height: 60px;
        }

        .product-stock-info {
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--gray-dark);
            margin-bottom: 1rem;
        }
        .stock-value {
            color: var(--success);
            font-weight: 600;
        }
        .stock-value.stock-low {
            color: var(--warning);
        }
        .stock-value.stock-out {
            color: var(--secondary);
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--dark);
        }

        .original-price {
            font-size: 0.9rem;
            color: var(--gray);
            text-decoration: line-through;
        }

        .discount-badge {
            background-color: var(--secondary-light);
            color: var(--secondary);
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .product-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.25rem;
            border-radius: var(--border-radius);
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            border: none;
            white-space: nowrap;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            flex: 1;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
        }

        .btn-icon {
            width: 42px;
            height: 42px;
            border-radius: var(--border-radius);
            background-color: var(--gray-extra-light);
            color: var(--dark);
        }

        .btn-icon:hover {
            background-color: var(--gray-light);
            color: var(--primary);
        }

        .btn-icon i {
            font-size: 1.1rem;
        }

        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 3rem;
        }

    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="{{ route('tienda.index') }}" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-store"></i>
                </div>
                <span class="logo-text">La Tiendita</span>
            </a>
            
            <nav class="nav">
                <a href="{{ route('tienda.index') }}" class="nav-link">Inicio</a>
                <a href="{{ route('tienda.categorias') }}" class="nav-link active">Categorías</a>
                <a href="{{ route('tienda.ofertas') }}" class="nav-link">Ofertas</a>
                <a href="{{ route('tienda.nosotros') }}" class="nav-link">Nosotros</a>
            </nav>
            
            <div class="nav-icons">
                <a href="#" class="icon-link">
                    <i class="fas fa-search"></i>
                </a>
                <a href="#" class="icon-link">
                    <i class="fas fa-user"></i>
                </a>
                <a href="#" class="icon-link">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="cart-count">0</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main">
        <h2 class="section-title"><i class="fas {{ $categoria->icono ?? 'fa-tag' }}"></i> Categoría: {{ $categoria->nombre }}</h2>

        <!-- Products Grid -->
        <div class="products-grid">
            @forelse($productos as $producto)
                <div class="product-card">
                    @if($producto->precio_oferta)
                        <div class="product-badge badge-sale">OFERTA</div>
                    @endif
                    <div class="product-image-container">
                        <img src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : 'https://via.placeholder.com/300x200?text=Producto' }}" 
                             alt="{{ $producto->nombre }}" class="product-image">
                    </div>

                    <div class="product-details">
                        <a href="{{ route('tienda.categoria', $producto->categoria) }}" class="product-category">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</a>
                        <h3 class="product-title">{{ $producto->nombre }}</h3>
                        
                        <p class="product-description">{{ \Illuminate\Support\Str::limit($producto->descripcion ?? 'Descripción no disponible', 100, '...') }}</p>

                        <div class="product-stock-info">
                            <span>Stock disponible: </span>
                            <span class="stock-value @if($producto->cantidad <= 0) stock-out @elseif($producto->cantidad < $producto->stock_minimo) stock-low @endif">
                                {{ $producto->cantidad }}
                            </span>
                        </div>

                        <div class="product-price">
                            @if($producto->precio_oferta)
                                <span class="original-price">{{ formatCLP($producto->precio) }}</span>
                                <span class="current-price" style="color: var(--secondary);">{{ formatCLP($producto->precio_oferta) }}</span>
                            @else
                                <span class="current-price">{{ formatCLP($producto->precio ?? 0) }}</span>
                            @endif
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Añadir
                            </button>
                            <button class="btn btn-icon">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                    <h3>No hay productos en esta categoría todavía.</h3>
                    <p>Vuelve a intentarlo más tarde.</p>
                </div>
            @endforelse
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <!-- Footer content from index.blade.php can be pasted here -->
    </footer>

</body>
</html>
