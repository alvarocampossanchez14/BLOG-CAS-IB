<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'Blog CAS IB Diploma | Programa del Bachillerato Internacional')</title>
        <meta name="description" content="@yield('meta_description', 'Blog dedicado a documentar proyectos y actividades CAS (Creatividad, Actividad y Servicio) del Programa del Diploma del Bachillerato Internacional (IB). Experiencias, reflexiones y evidencias.')">
        <meta name="keywords" content="CAS IB, Creatividad Actividad Servicio, Bachillerato Internacional, IB Diploma Programme, Proyectos CAS, Actividades CAS, Reflexión CAS, Evidencias CAS, Blog CAS">
        <meta name="author" content="Blog CAS | Programa del Diploma del IB">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', 'Blog CAS IB Diploma | Programa del Bachillerato Internacional')">
        <meta property="og:description" content="@yield('meta_description', 'Blog dedicado a documentar proyectos y actividades CAS (Creatividad, Actividad y Servicio) del Programa del Diploma del Bachillerato Internacional (IB). Experiencias, reflexiones y evidencias.')">
        <meta property="og:image" content="{{ asset('images/logo_ib.png') }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="{{ url()->current() }}">
        <meta name="twitter:title" content="@yield('title', 'Blog CAS IB Diploma | Programa del Bachillerato Internacional')">
        <meta name="twitter:description" content="@yield('meta_description', 'Blog dedicado a documentar proyectos y actividades CAS (Creatividad, Actividad y Servicio) del Programa del Diploma del Bachillerato Internacional (IB). Experiencias, reflexiones y evidencias.')">
        <meta name="twitter:image" content="{{ asset('images/logo_ib.png') }}">

        <!-- SEO adicional -->
        <meta name="robots" content="index, follow">
        <meta name="googlebot" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta name="theme-color" content="#000000">
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
