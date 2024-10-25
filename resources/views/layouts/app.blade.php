<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro Campos CAS BI</title>
    <meta name="description" content="{{ $description ?? 'Descubre nuestra gama de productos de impresión 3D personalizados. Calidad y diseño a medida.' }}">
    <meta name="keywords" content="impresión 3D, personalización, piezas únicas, alta calidad, impresión a medida">
    <meta name="author" content="My Mundo 3D">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="http://localhost:8000/storage/images/logo_blanco.png" type="image/x-icon">
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-primary-50  dark:text-white/50">
    @yield('content')

  @vite('resources/js/app.js')
  @stack('scripts')
</body>
</html>
