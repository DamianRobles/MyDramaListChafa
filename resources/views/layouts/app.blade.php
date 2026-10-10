<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'MyDramaListChafa')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dramas.index') }}">MyDramaListChafa</a>
    </div>
</nav>

<main class="container">
    @if (session('exito'))
        <div class="alert alert-success">{{ session('exito') }}</div>
    @endif

    @yield('contenido')
</main>
</body>
</html>
