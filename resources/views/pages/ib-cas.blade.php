@extends('layouts.app')

@section('content')
<div class="relative min-h-screen bg-gradient-to-br from-gray-900 to-black text-gray-100 overflow-hidden py-16">

    <div class="absolute inset-0 z-0 opacity-10" style="background-image: url('data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iNzUyIiBoZWlnaHQ9IjcxMiIgdmlld0JveD0iMCAwIDc1MiA3MTIiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxnIG9wYWNpdHk9IjAuMDkiPgo8Y2lyY2xlIGN4PSIzNzYiIGN5PSIzNTYiIHI9IjMxNC41IiBzdHJva2U9InVybCgjYWRkX2dyYWRpZW50X2RlZmluZV81MikiLz4KPGNpcmNsZSBjeD0iMzc2IiBjeT0iMzU2IiByPSIyMjUiIHN0cm9rZT0idXJsKCNhZGRfZ3JhZGllbnRfZGVmaW5lXzUzKSIvPgo8Y2lyY2xlIGN4PSIzNzYiIGN5PSIzNTYiIHI9IjE4NSIgc3Ryb2tlPSJ1cmwoI2FkZGVkX2dyYWRpZW50X2RlZmluZV81NCkiLz4KPC9nPgpkZWZzPjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81MiIgeDE9IjM3NiIgeTE9IjQxLjUiIHgyPSIzNzYiIHkyPSI2NjkuNSIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiMyOTA1RkYiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM2NDE5N0IiLz48L2xpbmVhcjY0MTk5M0JGRGdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81MyIgeDE9IjM3NiIgeTE9IjEzMSIgeDI9IjM3NiIgeTI9IjU4MiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiMyOTA1RkYiLz48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiM2NDE5N0IiLz48L2xpbmVhcjY0MTk3QmdyYWRpZW50PjxsaW5lYXJHcmFkaWVudCBpZD0iYWRkX2dyYWRpZW50X2RlZmluZV81NCIgeDE9IjM3NiIgeTE9IjE3MC41IiB4Mj0iMzc2IiB5Mj0iNTQxLjUiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBzdG9wLWNvbG9yPSIjMjkwNUZGIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjNjQxOTdCIi8+PC9saW5lYXJncmFkaWVudD48L2RlZnM+PC9zdmc+'); background-repeat: no-repeat; background-position: center center; background-size: cover;"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 flex flex-col items-center justify-center min-h-full">
        
        <h1 class="font-bold text-5xl lg:text-6xl text-primary-light leading-tight mb-12 text-center">
            Explorando el Programa del Diploma IB y CAS
        </h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 w-full">
            <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 flex flex-col justify-between">
                <div>
                    <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                        <i class="fas fa-graduation-cap mr-4 text-primary"></i> ¿Qué es el Bachillerato Internacional (IB)?
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        El Bachillerato Internacional (IB) es una prestigiosa fundación educativa sin ánimo de lucro que impulsa programas de educación de alta calidad a nivel global. Su misión es cultivar jóvenes solidarios, informados y con una insaciable sed de conocimiento, capaces de forjar un mundo más pacífico y mejor, fundamentado en el entendimiento mutuo y el respeto intercultural.
                    </p>
                </div>
            </div>

            <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 flex flex-col justify-between">
                <div>
                    <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                        <i class="fas fa-hands-helping mr-4 text-primary"></i> ¿Qué es el programa CAS?
                    </h2>
                    <p class="text-gray-300 text-lg leading-relaxed">
                        Creatividad, Actividad, Servicio (CAS) es un pilar fundamental del Programa del Diploma del IB. Este componente vital alienta a los estudiantes a trascender las aulas, involucrándose en proyectos y actividades significativas que nutren su desarrollo personal y social. CAS se enfoca en el florecimiento de la autonomía, la colaboración efectiva, la resolución creativa de problemas y, sobre todo, una profunda reflexión personal.
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 mt-10 w-full">
            <h2 class="font-semibold text-3xl text-primary-light mb-6 flex items-center">
                <i class="fas fa-boxes mr-4 text-primary"></i> Los Tres Pilares de CAS: Creatividad, Actividad, Servicio
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="p-4 rounded-lg bg-gray-700 bg-opacity-50 border border-gray-600">
                    <i class="fas fa-paint-brush text-primary text-4xl mb-3"></i>
                    <h3 class="font-semibold text-xl text-white mb-2">Creatividad</h3>
                    <p class="text-gray-300 text-md">Explorar y desarrollar ideas que culminan en productos o representaciones originales. Incluye arte, música, escritura y otras expresiones creativas.</p>
                </div>
                <div class="p-4 rounded-lg bg-gray-700 bg-opacity-50 border border-gray-600">
                    <i class="fas fa-running text-primary text-4xl mb-3"></i>
                    <h3 class="font-semibold text-xl text-white mb-2">Actividad</h3>
                    <p class="text-gray-300 text-md">Comprometerse con el desarrollo de habilidades físicas, promoviendo un estilo de vida activo y saludable a través de deportes o expediciones.</p>
                </div>
                <div class="p-4 rounded-lg bg-gray-700 bg-opacity-50 border border-gray-600">
                    <i class="fas fa-handshake text-primary text-4xl mb-3"></i>
                    <h3 class="font-semibold text-xl text-white mb-2">Servicio</h3>
                    <p class="text-gray-300 text-md">Un compromiso recíproco y colaborativo con la comunidad, abordando necesidades genuinas y generando beneficios mutuos.</p>
                </div>
            </div>
        </div>

        <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 mt-10 w-full">
            <h2 class="font-semibold text-3xl text-primary-light mb-6 flex items-center">
                <i class="fas fa-lightbulb mr-4 text-primary"></i> Resultados de Aprendizaje del CAS
            </h2>
            <p class="text-gray-300 text-lg leading-relaxed mb-6">
                A través de la vivencia del programa CAS, los estudiantes se enfocan en la consecución de siete resultados de aprendizaje fundamentales, que guían tanto la planificación de sus experiencias como el proceso de reflexión posterior.
            </p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-gray-300 text-lg list-none p-0">
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Identificar fortalezas y áreas de mejora.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Emprender nuevos desafíos con valentía.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Planificar, iniciar y mostrar perseverancia.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Colaborar de manera efectiva con otros.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Demostrar compromiso y responsabilidad.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Participar en temas de importancia global.</span>
                </li>
                <li class="flex items-start">
                    <i class="fas fa-check-circle text-primary mt-1 mr-3 text-xl"></i>
                    <span>Considerar las implicaciones éticas de sus acciones.</span>
                </li>
            </div>
        </div>
        
        <div class="bg-gray-800 bg-opacity-80 backdrop-filter backdrop-blur-lg p-8 rounded-2xl shadow-xl border border-gray-700 transform hover:scale-102 transition-transform duration-300 mt-10 w-full">
            <h2 class="font-semibold text-3xl text-primary-light mb-4 flex items-center">
                <i class="fas fa-brain mr-4 text-primary"></i> La Reflexión en el CAS
            </h2>
            <p class="text-gray-300 text-lg leading-relaxed">
                La reflexión es el corazón del programa CAS, un proceso continuo que permite a los alumnos profundizar en su aprendizaje y comprensión de sus experiencias. Ya sea a través de la escritura, la expresión oral o medios visuales, la reflexión es esencial para conectar las acciones con el crecimiento personal y los resultados de aprendizaje. Es un viaje de autodescubrimiento que transforma cada actividad en una lección valiosa.
            </p>
        </div>

    </div>
</div>
@endsection