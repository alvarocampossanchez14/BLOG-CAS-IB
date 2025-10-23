<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Álvaro Campos CAS BI</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Blog Álvaro Campos CAS | IB">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="icon" href="{{ asset('images/logo_ib.png') }}" type="image/x-icon">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gradient-to-br from-gray-900 to-black text-text">
        <div class="min-h-screen">  
            <x-navbar />
            <main>
                @yield('content')
            </main>

        </div>
        
        <x-footer />
        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
