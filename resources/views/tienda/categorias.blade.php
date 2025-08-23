<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todas las Categorías | Premium Store</title>
    <meta name="description" content="Explora todas las categorías de productos en nuestra tienda.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --primary-dark: #1a252f;
            --accent: #3498db;
            --light: #ffffff;
            --dark: #2c3e50;
            --gray-dark: #7f8c8d;
            --gray: #bdc3c7;
            --gray-light: #ecf0f1;
            --gray-extra-light: #f9f9f9;
            --border-radius: 0.375rem;
            --box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        body {
            background-color: var(--gray-extra-light);
            color: var(--dark);
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            line-height: 1.6;
            margin: 0;
        }
        .header {
            background-color: var(--light);
            box-shadow: var(--box-shadow);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 0.75rem 0;
            border-bottom: 1px solid var(--gray-light);
        }
        .header-container, .main, .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
        }
        .header-container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
        }
        .logo-icon {
            width: 42px; height: 42px; background-color: var(--primary); color: white; border-radius: var(--border-radius);
            display: flex; align-items: center; justify-content: center; font-size: 1.25rem;
        }
        .logo-text {
            font-size: 1.5rem; font-weight: 700; color: var(--dark);
        }
        .nav {
            display: flex; align-items: center; gap: 1.5rem;
        }
        .nav-link {
            color: var(--gray-dark); text-decoration: none; font-weight: 500; transition: var(--transition); font-size: 0.95rem; padding: 0.5rem 0;
        }
        .nav-link:hover, .nav-link.active {
            color: var(--primary);
        }
        /* Header Search Form */
        .header-search-form {
            position: relative;
            margin-right: 1.5rem; /* Space between search and icons */
        }
        .header-search-input {
            padding: 0.5rem 1rem 0.5rem 2.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--gray-light);
            font-size: 0.9rem;
            width: 200px; /* Adjust width as needed */
            transition: width 0.3s ease;
        }
        .header-search-input:focus {
            outline: none;
            border-color: var(--primary);
            width: 250px;
        }
        .header-search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray);
        }
        .nav-icons {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .icon-link {
            width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: var(--gray-dark); transition: var(--transition);
        }
        .icon-link:hover {
            background-color: var(--gray-extra-light);
            color: var(--primary);
        }
        .main {
            padding-top: 3rem; padding-bottom: 3rem;
        }
        .section-title {
            font-size: 2.25rem; font-weight: 700; margin-bottom: 2.5rem; color: var(--primary); text-align: center;
        }
        .categories-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
        }
        .category-card {
            display: block;
            background-color: var(--light);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 2rem;
            text-align: center;
            text-decoration: none;
            color: var(--dark);
            transition: var(--transition);
            border: 1px solid var(--gray-light);
        }
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
            border-color: var(--accent);
        }
        .category-card i {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            color: var(--accent);
            transition: color 0.3s;
        }
        .category-card:hover i {
            color: var(--primary);
        }
        .category-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
        }
        .footer {
            background-color: var(--primary-dark);
            color: white;
            padding: 4rem 0 2rem;
            margin-top: 3rem;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }
        .footer-col {
            display: flex;
            flex-direction: column;
        }
        .footer-logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
        }
        .footer-logo-icon {
            width: 42px; 
            height: 42px; 
            background-color: var(--light); 
            color: var(--primary); 
            border-radius: var(--border-radius);
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-size: 1.25rem;
        }
        .footer-logo-text {
            font-size: 1.5rem; 
            font-weight: 700; 
            color: var(--light);
        }
        .footer-description {
            color: var(--gray);
            margin-bottom: 1.5rem;
        }
        .social-links {
            display: flex;
            gap: 0.75rem;
        }
        .social-link {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            transition: var(--transition);
        }
        .social-link:hover {
            background-color: var(--accent);
        }
        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            color: white;
        }
        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .footer-link {
            margin-bottom: 0.75rem;
        }
        .footer-link a {
            color: var(--gray);
            text-decoration: none;
            transition: var(--transition);
        }
        .footer-link a:hover {
            color: var(--accent);
        }
        .footer-contact-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 1rem;
            color: var(--gray);
        }
        .footer-contact-item i {
            width: 20px;
            color: var(--accent);
        }
        .newsletter-form {
            display: flex;
            margin-top: 1rem;
        }
        .newsletter-input {
            flex: 1;
            padding: 0.75rem;
            border: none;
            border-radius: var(--border-radius) 0 0 var(--border-radius);
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }
        .newsletter-input::placeholder {
            color: var(--gray);
        }
        .newsletter-btn {
            padding: 0.75rem;
            background-color: var(--accent);
            color: white;
            border: none;
            border-radius: 0 var(--border-radius) var(--border-radius) 0;
            cursor: pointer;
            transition: var(--transition);
        }
        .newsletter-btn:hover {
            background-color: var(--primary);
        }
        .copyright {
            text-align: center;
            padding-top: 2.5rem;
            margin-top: 3rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--gray);
            font-size: 0.85rem;
        }
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
                <a href="{{ route('tienda.categorias') }}" class="nav-link active">Categorías</a>
                <a href="#" class="nav-link">Ofertas</a>
                <a href="#" class="nav-link">Nosotros</a>
            </nav>
            <form action="{{ route('tienda.categorias') }}" method="GET" class="header-search-form">
                <i class="fas fa-search header-search-icon"></i>
                <input type="text" name="q" class="header-search-input" placeholder="Buscar categorías..." value="{{ request('q') }}">
            </form>
            <div class="nav-icons">
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

    <main class="main">
        <h1 class="section-title">Explora Nuestras Categorías</h1>
        <div class="categories-grid">
            @forelse($categorias as $categoria)
                <a href="{{ route('tienda.categoria', $categoria) }}" class="category-card">
                    <i class="{{ $categoria->icono ?? 'fas fa-tag' }}"></i>
                    <h3>{{ $categoria->nombre }}</h3>
                </a>
            @empty
                <div style="grid-column: 1 / -1; text-align: center; padding: 4rem;">
                    <h3>No hay categorías para mostrar.</h3>
                </div>
            @endforelse
        </div>
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-grid">
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
                        @foreach($categorias as $categoria)
                            <li class="footer-link"><a href="{{ route('tienda.categoria', $categoria) }}">{{ $categoria->nombre }}</a></li>
                        @endforeach
                        <li class="footer-link"><a href="{{ route('tienda.categorias') }}">Ver todas</a></li>
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
        </div>
    </footer>
</body>
</html>
