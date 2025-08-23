<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Premium Store | Tienda Online de Calidad')</title>
    <meta name="description" content="@yield('description', 'Tienda online con los mejores productos. Envíos rápidos a todo el país.')">
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
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif; }
        body { background-color: var(--gray-extra-light); color: var(--dark); line-height: 1.6; }
        .header { background-color: var(--light); box-shadow: var(--box-shadow); position: sticky; top: 0; z-index: 1000; padding: 0.75rem 0; border-bottom: 1px solid var(--gray-light); }
        .header-container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; display: flex; align-items: center; justify-content: space-between; }
        .logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; transition: var(--transition); }
        .logo:hover { opacity: 0.9; }
        .logo-icon { width: 42px; height: 42px; background-color: var(--primary); color: white; border-radius: var(--border-radius); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); }
        .logo-text { font-size: 1.5rem; font-weight: 700; color: var(--dark); letter-spacing: -0.5px; }
        .nav { display: flex; align-items: center; gap: 1.5rem; }
        .nav-link { color: var(--gray-dark); text-decoration: none; font-weight: 500; transition: var(--transition); position: relative; font-size: 0.95rem; padding: 0.5rem 0; }
        .nav-link:hover, .nav-link.active { color: var(--primary); }
        .main { max-width: 1200px; margin: 0 auto; padding: 3rem 1.5rem; }
        .footer { background-color: var(--primary-dark); color: white; padding: 4rem 0 2rem; margin-top: 3rem; }
        .footer-container { max-width: 1200px; margin: 0 auto; padding: 0 1.5rem; }
        .copyright { text-align: center; padding-top: 2.5rem; margin-top: 3rem; border-top: 1px solid rgba(255, 255, 255, 0.1); color: var(--gray); font-size: 0.85rem; }
        /* Add any other shared styles here */
    </style>
    @stack('styles')
</head>
<body>
    <header class="header">
        <div class="header-container">
            <a href="{{ route('tienda.index') }}" class="logo">
                <div class="logo-icon"><i class="fas fa-store"></i></div>
                <span class="logo-text">La Tiendita</span>
            </a>
            <nav class="nav">
                <a href="{{ route('tienda.index') }}" class="nav-link {{ request()->routeIs('tienda.index') ? 'active' : '' }}">Inicio</a>
                <a href="{{ route('tienda.categorias') }}" class="nav-link {{ request()->routeIs('tienda.categorias') || request()->routeIs('tienda.categoria') ? 'active' : '' }}">Categorías</a>
                <a href="#" class="nav-link">Ofertas</a>
                <a href="#" class="nav-link">Nosotros</a>
            </nav>
        </div>
    </header>

    <main class="main">
        @yield('content')
    </main>

    <footer class="footer">
        <div class="footer-container">
            <div class="copyright">
                &copy; {{ date('Y') }} Premium Store. Todos los derechos reservados.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
