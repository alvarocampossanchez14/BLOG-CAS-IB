<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Álvaro Campos CAS BI</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Blog Álvaro Campos CAS | IB">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="http://localhost:8000/images/logo_ib.png" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/css/background.css')
</head>
<body class="font-sans antialiased text-text min-h-screen  bg-background">

    @include('components.navbar')
    @yield('content')

    @vite('resources/js/app.js')
    @stack('scripts')
</body>
</html>
