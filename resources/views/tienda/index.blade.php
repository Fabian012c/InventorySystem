<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Store | Tienda Online de Calidad</title>
    <meta name="description" content="Tienda online con los mejores productos. Envíos rápidos a todo el país.">
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

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            padding: 5rem 0;
            margin-bottom: 3rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('https://images.unsplash.com/photo-1555529669-e69e7aa0ba9a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
            opacity: 0.1;
            z-index: 0;
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            line-height: 1.2;
            max-width: 800px;
        }

        .hero-subtitle {
            font-size: 1.25rem;
            max-width: 700px;
            margin-bottom: 2.5rem;
            opacity: 0.9;
            font-weight: 400;
        }

        /* Search Bar */
        .search-container {
            width: 100%;
            max-width: 600px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 1rem 1.5rem 1rem 3.25rem;
            border-radius: var(--border-radius);
            border: none;
            font-size: 1rem;
            box-shadow: var(--box-shadow-lg);
            transition: var(--transition);
        }

        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3);
        }

        .search-icon {
            position: absolute;
            left: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }

        /* Main Content */
        .main {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem 3rem;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--primary);
            position: relative;
            padding-bottom: 0.75rem;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--primary);
        }

        /* Filters */
        .filters {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            flex-wrap: wrap;
            gap: 1.5rem;
            background-color: var(--light);
            padding: 1.25rem;
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
        }

        .filter-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .filter-label {
            font-weight: 500;
            color: var(--gray-dark);
            white-space: nowrap;
            font-size: 0.9rem;
        }

        .filter-select {
            padding: 0.6rem 1rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--gray-light);
            background-color: var(--light);
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            min-width: 180px;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--accent);
            box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
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

        /* Rating */
        .product-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            margin-bottom: 0.75rem;
        }

        .rating-stars {
            color: var(--warning);
            font-size: 0.85rem;
        }

        .rating-count {
            font-size: 0.8rem;
            color: var(--gray);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .page-item {
            width: 42px;
            height: 42px;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            border: 1px solid var(--gray-light);
            background-color: var(--light);
        }

        .page-item:hover, .page-item.active {
            border-color: var(--primary);
            background-color: var(--primary);
            color: white;
            transform: translateY(-2px);
        }

        /* Footer */
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 4rem 0 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 3rem;
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .footer-logo-icon {
            width: 42px;
            height: 42px;
            background-color: var(--accent);
            color: white;
            border-radius: var(--border-radius);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
        }

        .footer-logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .footer-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 0.75rem;
        }

        .social-link {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .social-link:hover {
            background-color: var(--accent);
            transform: translateY(-3px);
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: var(--accent);
        }

        .footer-links {
            list-style: none;
        }

        .footer-link {
            margin-bottom: 0.85rem;
        }

        .footer-link a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.9rem;
            display: inline-block;
            padding: 0.15rem 0;
        }

        .footer-link a:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-contact-item {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
            color: var(--gray);
            line-height: 1.5;
        }

        .footer-contact-item i {
            margin-top: 4px;
            color: var(--accent);
            font-size: 0.95rem;
        }

        .newsletter-form {
            display: flex;
            margin-top: 1.5rem;
        }

        .newsletter-input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            font-size: 0.9rem;
        }

        .newsletter-input:focus {
            outline: none;
        }

        .newsletter-btn {
            background-color: var(--accent);
            color: white;
            border: none;
            padding: 0 1.25rem;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
            transition: var(--transition);
        }

        .newsletter-btn:hover {
            background-color: #2980b9;
        }

        .copyright {
            text-align: center;
            padding-top: 2.5rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray);
            font-size: 0.85rem;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .hero-title {
                font-size: 2.25rem;
            }
            
            .hero-subtitle {
                font-size: 1.1rem;
            }
            
            .nav {
                gap: 1.25rem;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1.25rem;
                padding: 1rem 1.5rem;
            }
            
            .nav {
                gap: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .hero {
                padding: 3.5rem 0;
            }
            
            .hero-title {
                font-size: 2rem;
            }
            
            .filters {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }
            
            .filter-group {
                width: 100%;
                flex-wrap: wrap;
            }
            
            .filter-select {
                flex: 1;
                min-width: 100%;
            }

            .footer-container {
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }

        @media (max-width: 576px) {
            .products-grid {
                grid-template-columns: 1fr;
            }
            
            .hero-title {
                font-size: 1.75rem;
            }
            
            .product-actions {
                flex-direction: column;
            }
            
            .btn-primary {
                width: 100%;
            }

            .footer-container {
                grid-template-columns: 1fr;
            }

            .logo-text {
                font-size: 1.3rem;
            }

            .nav {
                gap: 0.75rem;
            }

            .nav-link {
                font-size: 0.9rem;
            }
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
                <a href="{{ route('tienda.index') }}" class="nav-link active">Inicio</a>
                <a href="{{ route('dashboard.index') }}" class="nav-link">Dashboard</a>
                <a href="{{ route('categorias.index') }}" class="nav-link">Categorías</a>
                <a href="#" class="nav-link">Ofertas</a>
                <a href="#" class="nav-link">Nosotros</a>
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

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-container">
            <h1 class="hero-title">Productos random para tu Vida Cotidiana</h1>
            <p class="hero-subtitle">La mejor Tienda de chile</p>
            
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Buscar productos...">
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main">
        <h2 class="section-title">Nuestros Productos Destacados</h2>
        
        <!-- Filters -->
        <div class="filters">
            <div class="filter-group">
                <span class="filter-label">Ordenar por:</span>
                <select class="filter-select">
                    <option>Recomendados</option>
                    <option>Menor precio</option>
                    <option>Mayor precio</option>
                    <option>Más vendidos</option>
                    <option>Novedades</option>
                </select>
            </div>
            
            <div class="filter-group">
                <span class="filter-label">Filtrar por:</span>
                <select class="filter-select">
                    <option>Todos los productos</option>
                    <option>En oferta</option>
                    <option>Nuevos</option>
                    <option>Con stock</option>
                </select>
                <select class="filter-select">
                    <option>Categoría: Todas</option>
                    @foreach($productos->pluck('categoria.nombre')->unique() as $categoriaNombre)
                        @if($categoriaNombre)
                            <option>{{ $categoriaNombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="products-grid">
            @foreach($productos as $producto)
                <div class="product-card">
                    @if(isset($producto->nuevo) && $producto->nuevo)
                        <span class="product-badge badge-new">Nuevo</span>
                    @elseif(isset($producto->descuento) && $producto->descuento > 0)
                        <span class="product-badge badge-sale">Oferta -{{ $producto->descuento }}%</span>
                    @endif

                    <div class="product-image-container">
                        <img src="{{ $producto->imagen ?? 'https://via.placeholder.com/300x200?text=Producto' }}" 
                             alt="{{ $producto->nombre }}" class="product-image">
                    </div>

                    <div class="product-details">
                        <span class="product-category">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</span>
                        <h3 class="product-title">{{ $producto->nombre }}</h3>
                        
                        <div class="product-rating">
                            <div class="rating-stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="rating-count">(24)</span>
                        </div>
                        
                        <p class="product-description">{{ \Illuminate\Support\Str::limit($producto->descripcion ?? 'Descripción no disponible', 100, '...') }}</p>

                        <div class="product-price">
                            @if(isset($producto->precio_original) && $producto->precio_original > $producto->precio)
                                <span class="current-price">${{ number_format($producto->precio, 2) }}</span>
                                <span class="original-price">${{ number_format($producto->precio_original, 2) }}</span>
                                <span class="discount-badge">Ahorra {{ number_format(($producto->precio_original - $producto->precio)/$producto->precio_original*100, 0) }}%</span>
                            @else
                                <span class="current-price">${{ number_format($producto->precio ?? 0, 2) }}</span>
                            @endif
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary" onclick="addToCart('{{ $producto->nombre }}')">
                                <i class="fas fa-shopping-cart"></i> Añadir
                            </button>
                            <button class="btn btn-icon" onclick="toggleWishlist(this)">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <div class="page-item">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="page-item active">1</div>
            <div class="page-item">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-col">
                <div class="footer-logo">
                    <div class="footer-logo-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <span class="footer-logo-text">La Tiendita</span>
                </div>
                <p class="footer-description">
                    Ofrecemos productos de alta calidad seleccionados cuidadosamente para satisfacer tus necesidades diarias con excelente servicio al cliente.
                </p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-pinterest"></i></a>
                </div>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Categorías</h4>
                <ul class="footer-links">
                    @foreach($productos->pluck('categoria.nombre')->unique() as $categoriaNombre)
                        @if($categoriaNombre)
                            <li class="footer-link"><a href="#">{{ $categoriaNombre }}</a></li>
                        @endif
                    @endforeach
                    <li class="footer-link"><a href="#">Ver todas</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Mi Cuenta</h4>
                <ul class="footer-links">
                    <li class="footer-link"><a href="#">Mis pedidos</a></li>
                    <li class="footer-link"><a href="#">Lista de deseos</a></li>
                    <li class="footer-link"><a href="#">Direcciones</a></li>
                    <li class="footer-link"><a href="#">Detalles de cuenta</a></li>
                    <li class="footer-link"><a href="#">Historial</a></li>
                    <li class="footer-link"><a href="#">Cupones</a></li>
                </ul>
            </div>
            
            <div class="footer-col">
                <h4 class="footer-title">Contacto</h4>
                <div class="footer-contact-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <span>Chile / Puerto Montt</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-phone-alt"></i>
                    <span>+569 4122 7606<br>Lun-Vie: 9am-6pm</span>
                </div>
                <div class="footer-contact-item">
                    <i class="fas fa-envelope"></i>
                    <span>info@premiumstore.com<br>soporte@premiumstore.com</span>
                </div>
                
                <h4 class="footer-title" style="margin-top: 1.5rem;">Newsletter</h4>
                <p class="footer-description" style="margin-bottom: 1rem;">
                    Suscríbete para recibir ofertas exclusivas y novedades.
                </p>
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Tu email">
                    <button type="submit" class="newsletter-btn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <div class="copyright">
            &copy; {{ date('Y') }} Premium Store. Todos los derechos reservados. | 
            <a href="#" style="color: var(--gray);">Términos y condiciones</a> | 
            <a href="#" style="color: var(--gray);">Política de privacidad</a>
        </div>
    </footer>

    <script>
        // Funcionalidad mejorada
        document.addEventListener('DOMContentLoaded', function() {
            // Búsqueda en tiempo real
            const searchInput = document.querySelector('.search-input');
            const productCards = document.querySelectorAll('.product-card');
            
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                
                productCards.forEach(card => {
                    const title = card.querySelector('.product-title').textContent.toLowerCase();
                    const description = card.querySelector('.product-description').textContent.toLowerCase();
                    const category = card.querySelector('.product-category').textContent.toLowerCase();
                    
                    if (searchTerm === '' || title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });

            // Filtros
            const filterSelects = document.querySelectorAll('.filter-select');
            filterSelects.forEach(select => {
                select.addEventListener('change', function() {
                    console.log(`Filtrar por: ${this.value}`);
                    // Aquí iría la lógica real de filtrado
                });
            });

            // Paginación
            const pageItems = document.querySelectorAll('.page-item');
            pageItems.forEach(item => {
                item.addEventListener('click', function() {
                    pageItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    console.log(`Ir a página: ${this.textContent.trim()}`);
                });
            });
        });

        // Añadir al carrito
        function addToCart(productName) {
            alert(`"${productName}" añadido al carrito`);
            const cartCount = document.querySelector('.cart-count');
            let count = parseInt(cartCount.textContent);
            cartCount.textContent = count + 1;
            
            // Animación
            cartCount.style.transform = 'scale(1.5)';
            setTimeout(() => {
                cartCount.style.transform = 'scale(1)';
            }, 300);
        }

        // Lista de deseos
        function toggleWishlist(button) {
            const icon = button.querySelector('i');
            const productTitle = button.closest('.product-card').querySelector('.product-title').textContent;

            if (icon.classList.contains('far')) {
                icon.classList.remove('far');
                icon.classList.add('fas', 'text-danger');
                alert(`"${productTitle}" añadido a favoritos`);
            } else {
                icon.classList.remove('fas', 'text-danger');
                icon.classList.add('far');
                alert(`"${productTitle}" eliminado de favoritos`);
            }
            
            // Animación
            button.style.transform = 'scale(1.2)';
            setTimeout(() => {
                button.style.transform = 'scale(1)';
            }, 300);
        }

        // Newsletter
        const newsletterForm = document.querySelector('.newsletter-form');
        if (newsletterForm) {
            newsletterForm.addEventListener('submit', function(e) {
                e.preventDefault();
                const email = this.querySelector('input').value;
                if (email.includes('@')) {
                    alert(`Gracias por suscribirte con ${email}`);
                    this.querySelector('input').value = '';
                } else {
                    alert('Por favor ingresa un email válido');
                }
            });
        }
    </script>
</body>
</html>