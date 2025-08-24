<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Búsqueda para "{{ $query }}" | Premium Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --primary-dark: #1a252f;
            --secondary: #e74c3c;
            --accent: #3498db;
            --light: #ffffff;
            --dark: #2c3e50;
            --gray-dark: #7f8c8d;
            --gray-light: #ecf0f1;
            --gray-extra-light: #f9f9f9;
            --border-radius: 0.375rem;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
        body { background-color: var(--gray-extra-light); color: var(--dark); line-height: 1.6; }
        .header { background-color: var(--light); box-shadow: var(--box-shadow); position: sticky; top: 0; z-index: 1000; padding: 0.75rem 0; border-bottom: 1px solid var(--gray-light); }
        .header-container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; display: flex; align-items: center; justify-content: space-between; }
        .logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; }
        .logo-icon { width: 42px; height: 42px; background-color: var(--primary); color: white; border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; }
        .logo-text { font-size: 1.5rem; font-weight: 700; color: var(--dark); }
        .nav { display: flex; align-items: center; gap: 1.5rem; }
        .nav-link { color: var(--gray-dark); text-decoration: none; font-weight: 500; transition: var(--transition); font-size: 0.95rem; }
        .header-search-form {
            position: relative;
        }
        .header-search-input {
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--gray-light);
            font-size: 0.9rem;
            width: 200px;
            transition: width 0.3s ease;
        }
        .header-search-input:focus {
            outline: none;
            border-color: var(--accent);
            width: 250px;
        }
        .header-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        .main { max-width: 1200px; margin: 0 auto; padding: 3rem 1.5rem; }
        .section-header { text-align: center; margin-bottom: 2.5rem; }
        .section-title { font-size: 2.25rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; }
        .section-subtitle { font-size: 1.1rem; color: var(--gray-dark); }
        .products-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 2rem; }
        .product-card { background-color: var(--light); border-radius: var(--border-radius); box-shadow: var(--box-shadow); overflow: hidden; transition: var(--transition); position: relative; border: 1px solid var(--gray-light); }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
        .product-badge { position: absolute; top: 1rem; left: 1rem; padding: 0.35rem 0.85rem; border-radius: 2rem; font-size: 0.75rem; font-weight: 600; z-index: 10; }
        .badge-sale { background-color: var(--secondary-light); color: var(--secondary); }
        .product-image-container { width: 100%; height: 220px; overflow: hidden; }
        .product-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .product-card:hover .product-image { transform: scale(1.05); }
        .product-details { padding: 1.5rem; }
        .product-category { color: var(--accent); font-size: 0.75rem; font-weight: 600; }
        .product-title { font-size: 1.15rem; font-weight: 600; margin-bottom: 0.75rem; }
        .product-price { display: flex; align-items: baseline; gap: 0.75rem; margin-bottom: 1.5rem; }
        .current-price { font-size: 1.3rem; font-weight: 700; }
        .original-price { font-size: 0.9rem; color: var(--gray-dark); text-decoration: line-through; }
        .btn { display: inline-flex; padding: 0.75rem 1.25rem; border-radius: var(--border-radius); font-weight: 500; cursor: pointer; border: none; }
        .btn-primary { background-color: var(--primary); color: white; }
        .footer { background-color: var(--primary-dark); color: white; padding: 4rem 0 2rem; margin-top: 3rem; }
    </style>
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="{{ route('tienda.index') }}" class="logo">
                <div class="logo-icon"><i class="fas fa-store"></i></div>
                <span class="logo-text">La Tiendita</span>
            </a>
            <nav class="nav">
                <a href="{{ route('tienda.index') }}" class="nav-link">Inicio</a>
                <a href="{{ route('tienda.categorias') }}" class="nav-link">Categorías</a>
                <a href="{{ route('tienda.ofertas') }}" class="nav-link">Ofertas</a>
                <a href="{{ route('tienda.nosotros') }}" class="nav-link">Nosotros</a>
            </nav>

            <form action="{{ route('tienda.buscar') }}" method="GET" class="header-search-form">
                <i class="fas fa-search header-search-icon"></i>
                <input type="text" name="q" class="header-search-input" placeholder="Buscar productos..." value="{{ request('q') ?? '' }}">
            </form>
        </div>
    </header>

    <main class="main">
        <div class="section-header">
            <h1 class="section-title">Resultados de Búsqueda</h1>
            <p class="section-subtitle">Mostrando resultados para: <strong>"{{ $query }}"</strong></p>
        </div>

        <div class="products-grid">
            @forelse($productos as $producto)
                <div class="product-card">
                    @if($producto->precio_oferta)
                        <div class="product-badge badge-sale">OFERTA</div>
                    @endif
                    <div class="product-image-container">
                        <a href="{{ route('tienda.producto', $producto->id) }}">
                            <img src="{{ $producto->imagen ? asset('storage/' . $producto->imagen) : 'https://via.placeholder.com/300x200?text=Producto' }}" 
                                 alt="{{ $producto->nombre }}" class="product-image">
                        </a>
                    </div>
                    <div class="product-details">
                        <a href="{{ route('tienda.categoria', $producto->categoria) }}" class="product-category">{{ $producto->categoria->nombre ?? 'Sin categoría' }}</a>
                        <h3 class="product-title">{{ $producto->nombre }}</h3>
                        <div class="product-price">
                            @if($producto->precio_oferta)
                                <span class="original-price">{{ formatCLP($producto->precio) }}</span>
                                <span class="current-price" style="color: var(--secondary);">{{ formatCLP($producto->precio_oferta) }}</span>
                            @else
                                <span class="current-price">{{ formatCLP($producto->precio) }}</span>
                            @endif
                        </div>
                        <div class="product-actions">
                            <button class="btn btn-primary">
                                <i class="fas fa-shopping-cart"></i> Añadir
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                    <h3>No se encontraron productos para "{{ $query }}".</h3>
                    <p>Intenta con otro término de búsqueda.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center" style="margin-top: 2rem;">
            {{ $productos->links() }}
        </div>
    </main>

    <footer class="footer">
        <div class="header-container">
            <p>&copy; {{ date('Y') }} La Tiendita. Todos los derechos reservados.</p>
        </div>
    </footer>
</body>
</html>
