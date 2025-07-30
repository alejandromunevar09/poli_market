<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PoliMarket</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- si usas Laravel Mix -->
</head>
<body>
<header>
    <h1>PoliMarket - Sistema de Gestión</h1>
    <nav>
        <a href="{{ route('clientes.index') }}">Clientes</a> |
        <a href="{{ route('vendedores.index') }}">Vendedores</a> |
        <a href="{{ route('productos.index') }}">Productos</a> |
        <a href="{{ route('proveedores.index') }}">Proveedores</a>
    </nav>
    <hr>
</header>

<main>
    @yield('content')
</main>

<footer>
    <hr>
    <p>© {{ date('Y') }} PoliMarket</p>
</footer>
</body>
</html>
