@extends('layouts.app')

@section('content')
<div class="relative min-h-screen text-gray-100 overflow-hidden py-16">

    <div class="absolute inset-0 z-0 opacity-10" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNzUyIiBoZWlnaHQ9IjcxMiIgdmlld0JveD0iMCAwIDc1MiA3MTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIG9wYWNpdHk9IjAuMDkiPgo8Y2lyY2xlIGN4PSIzNzYiIGN5PSIzNTYiIHI9IjMxNC41IiBzdHJva2U9InVybCgjYWRkX2dyYWRpZW50X2RlZmluZV81MikiLz4KPGNpcmNsZSBjeD0iMzc2IiBjeT0iMzU2IiByPSIyMjUiIHN0cm9rZT0idXJsKCNhZGRfZ3JhZGllbnRfZGVmaW5lXzUzKSIvPgo8Y2lyY2xlIGN4PSIzNzYiIGN5PSIzNTYiIHI9IjE4NSIgc3Ryb2tlPSJ1cmwoI2FkZGVkX2dyYWRpZW50X2RlZmluZV81NCkiLz4KPC9nPgpkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81MiIgeDE9IjM3NiIgeTE9IjQxLjUiIHgyPSIzNzYiIHkyPSI2NjkuNSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiMyOTA1RkYiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM2NDE5N0IiLz48L2xpbmVhcjY0MTk3QmdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81MyIgeDE9IjM3NiIgeTE9IjEzMSIgeDI9IjM3NiIgeTI9IjU4MiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiMyOTA1RkYiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM2NDE5N0IiLz48L2xpbmVhcjY0MTk3QmdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81NCIgeDE9IjM3NiIgeTE9IjE3MC41IiB4Mj0iMzc2IiB5Mj0iNTQxLjUiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBzdG9wLWNvbG9yPSIjMjkwNUZGIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjNjQxOTdCIi8+PC9saW5lYXJncmFkaWVudD48L2RlZnM+PC9zdmc+'); background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 flex flex-col items-center justify-center min-h-full">
        
        <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg rounded-3xl shadow-2xl p-8 sm:p-10 lg:p-12 text-center w-full max-w-4xl transform hover:scale-102 transition-transform duration-300">
            <img src="{{ asset('storage/images/foto_1.jpeg') }}" 
                 alt="Tu Foto de Perfil" 
                 class="w-48 h-48 rounded-full mx-auto object-cover border-6 border-primary-light shadow-xl mb-6 ring-4 ring-primary-dark">
            
            <h1 class="font-bold text-5xl lg:text-6xl text-primary-light leading-tight mb-3">
                Álvaro Campos Sánchez
            </h1>
            <p class="text-gray-300 text-2xl lg:text-3xl font-light mb-6">
                Desarrollador Web en Formación | Apasionado por la Montaña
            </p>

            <div class="flex justify-center space-x-8 text-xl lg:text-2xl text-gray-400 mb-8">
                <a href="mailto:tu.alvarocamposdev@gmail.com" class="hover:text-primary transition duration-300">
                    <i class="fas fa-envelope"></i>
                </a>
                <a href="https://github.com/alvarocampossanchez14" target="_blank" class="hover:text-primary transition duration-300">
                    <i class="fab fa-github"></i>
                </a>
            </div>

            <p class="text-gray-300 text-lg lg:text-xl leading-relaxed mb-6">
                ¡Hola! Soy Álvaro Campos Sánchez, un entusiasta del desarrollo web con una mente siempre curiosa y en constante búsqueda de nuevos desafíos. Actualmente, compagino mi formación en el área de la tecnología con mi inmersión en el Programa del Diploma del Bachillerato Internacional, donde he aprendido la importancia de la acción, la creatividad y el servicio a través del programa CAS, visible en los proyectos de este sitio.
            </p>
            <p class="text-gray-300 text-lg lg:text-xl leading-relaxed">
                Mi pasión por la tecnología me impulsa a explorar cómo las soluciones digitales pueden mejorar el mundo. Fuera de las pantallas, encuentro mi equilibrio y energía en la montaña, donde el trail running, el senderismo y la simple contemplación de la naturaleza son mi refugio.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mt-16 w-full max-w-6xl">
            
            <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300">
                <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                    <i class="fas fa-code mr-4 text-primary"></i> Mi Mundo Tecnológico
                </h2>
                <p class="text-gray-300 text-lg leading-relaxed mb-4">
                    La programación es mi lienzo, y el código, mi pincel. Disfruto construyendo y dando vida a ideas a través de líneas de código, siempre buscando la elegancia y la eficiencia.
                </p>
                <ul class="list-disc list-inside text-gray-300 text-lg space-y-2">
                    <li><strong class="text-white">Desarrollo Web:</strong> HTML, CSS, JavaScript, PHP (Laravel), Bases de Datos (MySQL).</li>
                    <li><strong class="text-white">Lenguajes Adicionales:</strong> Python.</li>
                    <li><strong class="text-white">Metodologías:</strong> Siempre aprendiendo y aplicando las mejores prácticas.</li>
                </ul>
            </div>

            <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300">
                <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                    <i class="fas fa-mountain mr-4 text-primary"></i> Pasión por la Montaña y el Deporte
                </h2>
                <p class="text-gray-300 text-lg leading-relaxed">
                    Cuando no estoy frente a una pantalla, es probable que me encuentres en la montaña. El trail running, el senderismo y las rutas de hiking son más que un pasatiempo; son una filosofía de vida que me conecta con la naturaleza y me enseña perseverancia.
                </p>
                <p class="text-gray-300 text-lg leading-relaxed mt-4">
                    Cada cima alcanzada, cada kilómetro recorrido, me inspira a superar límites y a apreciar la belleza del entorno. Es ahí donde recargo energías y encuentro nuevas perspectivas.
                </p>
            </div>
        </div>

        <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 mt-10 w-full max-w-6xl">
            <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                <i class="fas fa-compass mr-4 text-primary"></i> Mi Visión y Metas
            </h2>
            <p class="text-gray-300 text-lg leading-relaxed">
                Mi objetivo es fusionar mi creciente experiencia tecnológica con mi compromiso social, aplicando mis habilidades para desarrollar soluciones innovadoras que aborden desafíos reales y contribuyan a un futuro más sostenible. Aspiro a seguir explorando nuevas tecnologías, creando impacto positivo y nunca dejar de aprender, tanto en el mundo digital como en las grandes cumbres.
            </p>
        </div>

    </div>
</div>
@endsection