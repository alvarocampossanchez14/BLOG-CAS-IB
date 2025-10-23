@extends('layouts.app')

@section('content')
<article class="min-h-screen text-gray-100 font-sans antialiased">

    {{-- Header Section: Title, Metadata, and Image Preview --}}
    <header class="relative w-full h-[60vh] flex items-end px-6 py-12 md:py-20 border-b border-gray-800 overflow-hidden z-20">
        {{-- Image Preview --}}
        @if ($project->image && Storage::disk('public')->exists($project->image))
            <img src="{{ asset('storage/' . $project->image) }}" alt="Imagen de portada del proyecto" class="absolute inset-0 w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
        @else
            <div class="absolute inset-0 bg-gray-800 flex items-center justify-center">
                <p class="text-gray-400 text-xl">Imagen no disponible</p>
            </div>
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
        @endif

        {{-- Title and Metadata --}}
        <div class="relative z-10 max-w-screen-xl mx-auto w-full">
            <h1 class="text-4xl sm:text-5xl md:text-6xl font-extrabold leading-tight text-white tracking-tight drop-shadow-md">
                {{ $project->title }}
            </h1>
            <p class="text-xl sm:text-2xl text-gray-400 font-semibold mt-3 flex items-center">
                <i class="far fa-calendar-alt mr-3 text-primary"></i>
                <span>{{ $project->start_date ? \Carbon\Carbon::parse($project->start_date)->locale('es')->isoFormat('LL') : 'Fecha no especificada' }}</span>
                <span class="mx-4 text-gray-600 hidden sm:inline">a</span>
                <span>{{ $project->end_date ? \Carbon\Carbon::parse($project->end_date)->locale('es')->isoFormat('LL') : 'Fecha no especificada' }}</span>
                @if($project->location)
                    <span class="mx-4 text-gray-600 hidden sm:inline">|</span>
                    <i class="fas fa-map-marker-alt mr-3 text-primary hidden sm:inline"></i>
                    <span class="hidden sm:inline">{{ $project->location }}</span>
                @endif
            </p>
        </div>
    </header>

    {{-- Main Content & Sidebar Grid --}}
    <div class="max-w-screen-xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">

        {{-- Main Content Column --}}
        <main class="lg:col-span-2 space-y-12">

            {{-- Project Description Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-info-circle mr-4 text-3xl"></i> Descripción del Proyecto
                </h2>
                <p class="text-lg text-gray-300 leading-relaxed">
                    {{ $project->description }}
                </p>
            </section>

            {{-- CAS Areas & Learning Outcomes Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-puzzle-piece mr-4 text-3xl"></i> Dimensiones CAS y Aprendizaje
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- CAS Areas --}}
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-cubes mr-3 text-gray-400"></i> Áreas Centrales
                        </h3>
                        <div class="space-y-3 text-lg text-gray-300">
                            @if($project->creativity)
                                <p><strong class="text-gray-200">Creatividad:</strong> <span class="whitespace-pre-wrap">{{ $project->creativity }}</span></p>
                            @endif
                            @if($project->activity)
                                <p><strong class="text-gray-200">Actividad:</strong> <span class="whitespace-pre-wrap">{{ $project->activity }}</span></p>
                            @endif
                            @if($project->service)
                                <p><strong class="text-gray-200">Servicio:</strong> <span class="whitespace-pre-wrap">{{ $project->service }}</span></p>
                            @endif
                            @if (!$project->creativity && !$project->activity && !$project->service)
                                <p class="text-gray-400">No se especificaron áreas CAS.</p>
                            @endif
                        </div>
                    </div>
                    {{-- Learning Outcomes --}}
                    <div>
                        <h3 class="text-xl font-semibold text-white mb-4 flex items-center">
                            <i class="fas fa-graduation-cap mr-3 text-gray-400"></i> Resultados de Aprendizaje
                        </h3>
                        <div class="grid grid-cols-2 gap-3">
                            @php $hasLearningOutcomes = false; @endphp
                            @for ($i = 1; $i <= 7; $i++)
                                @if ($project->{"lo_$i"})
                                    <span class="bg-primary text-white text-sm font-bold px-4 py-2 rounded-full shadow-md text-center transform hover:scale-105 transition duration-300 ease-in-out">
                                        LO {{ $i }}
                                    </span>
                                    @php $hasLearningOutcomes = true; @endphp
                                @endif
                            @endfor
                            @if (!$hasLearningOutcomes)
                                <p class="text-gray-400 col-span-full">Ningún resultado de aprendizaje marcado.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </section>

            {{-- Reflection & Evaluation Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-lightbulb mr-4 text-3xl"></i> Reflexión y Valoración
                </h2>
                <div class="space-y-8">
                    @if($project->reflection)
                        <div class="text-lg text-gray-300">
                            <strong class="block mb-2 text-gray-200"><i class="fas fa-pen-alt mr-2"></i> Reflexión:</strong>
                            <p class="whitespace-pre-wrap leading-relaxed">{{ $project->reflection }}</p>
                        </div>
                    @endif
                    @if($project->evaluation_and_objectives)
                        <div class="text-lg text-gray-300 pt-6 border-t border-gray-700">
                            <strong class="block mb-2 text-gray-200"><i class="fas fa-star mr-2"></i> Valoración y Objetivos:</strong>
                            <p class="whitespace-pre-wrap leading-relaxed">{{ $project->evaluation_and_objectives }}</p>
                        </div>
                    @endif
                    @if (!$project->reflection && !$project->evaluation_and_objectives)
                        <p class="text-gray-400 text-center py-4">No hay reflexión o valoración para este proyecto.</p>
                    @endif
                </div>
            </section>
        

            {{-- Evidences Gallery Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-camera-retro mr-4 text-3xl"></i> Galería de Evidencias
                </h2>
                @if ($project->evidences->isEmpty())
                    <p class="text-lg text-gray-400 text-center py-4">No hay evidencias subidas para este proyecto.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($project->evidences as $evidence)
                            @php
                                $extension = pathinfo($evidence->file_path, PATHINFO_EXTENSION);
                                $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp']);
                                $isPdf = in_array(strtolower($extension), ['pdf']);
                            @endphp
                            <div class="bg-gray-700 rounded-lg shadow-md overflow-hidden group">
                                <a href="#" onclick="event.preventDefault(); openModal('{{ asset('storage/' . $evidence->file_path) }}', '{{ $evidence->file_name }}', '{{ $isImage }}', '{{ $isPdf }}')" 
                                   class="block w-full h-48 relative cursor-pointer">
                                    @if ($isImage && Storage::disk('public')->exists($evidence->file_path))
                                        <img src="{{ asset('storage/' . $evidence->file_path) }}" alt="{{ $evidence->file_name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                                    @elseif ($isPdf && Storage::disk('public')->exists($evidence->file_path))
                                        <div class="flex flex-col items-center justify-center w-full h-full text-white bg-gray-600">
                                            <i class="fas fa-file-pdf fa-4x mb-2 text-red-500"></i>
                                            <span class="text-sm font-medium text-center px-2 text-gray-300">PDF</span>
                                        </div>
                                    @else
                                        <div class="flex flex-col items-center justify-center w-full h-full text-white bg-gray-600">
                                            <i class="fas fa-file-alt fa-4x mb-2 text-primary"></i>
                                            <span class="text-sm font-medium text-center px-2 text-gray-300">{{ strtoupper($extension) }} File</span>
                                        </div>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </section>

        </main>

        {{-- Sidebar Column --}}
        <aside class="lg:col-span-1 space-y-12">

            {{-- Supervisor Info Card --}}
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-2xl font-bold text-primary mb-5 flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-user-tie mr-3"></i> Información del Supervisor
                </h3>
                <div class="space-y-4">
                    <p class="text-lg text-gray-300 flex items-center">
                        <i class="fas fa-user-circle mr-3 text-primary"></i>
                        <strong class="mr-2">Nombre:</strong> <span class="flex-grow">{{ $project->supervisor_name ?? 'No especificado' }}</span>
                    </p>
                    <p class="text-lg text-gray-300 flex items-center">
                        <i class="fas fa-envelope mr-3 text-primary"></i>
                        <strong class="mr-2">Contacto:</strong> <span class="flex-grow">{{ $project->supervisor_contact ?? 'No especificado' }}</span>
                    </p>
                </div>
            </div>

            {{-- More Projects Card --}}
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-2xl font-bold text-primary mb-6 flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-compass mr-3"></i> Más Proyectos
                </h3>
                <ul class="space-y-8">
                    @forelse($recentProjects as $recentProject)
                        <li class="bg-gray-700 p-4 rounded-xl shadow-md transform hover:scale-[1.02] hover:bg-gray-600 transition duration-300">
                           <a href="{{ route('projects.show', $recentProject->slug) }}" class="flex space-x-5 items-start group w-full">
                                @if ($recentProject->image && Storage::disk('public')->exists($recentProject->image))
                                    <img src="{{ asset('storage/' . $recentProject->image) }}" alt="{{ $recentProject->title }}" class="w-24 h-24 rounded-lg object-cover flex-shrink-0 border-2 border-primary">
                                @else
                                    <div class="w-24 h-24 rounded-lg bg-gray-600 flex items-center justify-center text-gray-400 flex-shrink-0 border-2 border-primary">
                                        <i class="fas fa-image fa-2x text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-grow">
                                    <h4 class="font-bold text-white text-lg leading-tight mb-1 group-hover:text-primary transition-colors duration-200">{{ Str::limit($recentProject->title, 40) }}</h4>
                                    <p class="text-sm text-gray-400 flex items-center mb-1"><i class="far fa-calendar-alt mr-2 text-gray-500"></i>{{ \Carbon\Carbon::parse($recentProject->start_date)->format('d/m/Y') }}</p>
                                </div>
                           </a>
                        </li>
                    @empty
                        <p class="text-gray-400 text-center py-4">No hay otros proyectos recientes disponibles.</p>
                    @endforelse
                </ul>
            </div>

        </aside>
    </div>
</article>

{{-- Modal para previsualización de evidencias --}}
<div id="previewModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-75 flex items-center justify-center p-4">
    <div class="bg-gray-800 rounded-xl max-w-4xl w-full max-h-[90vh] overflow-hidden relative">
        <button onclick="closeModal()" class="absolute top-4 right-4 text-white text-3xl hover:text-gray-400 z-50">
            &times;
        </button>
        <div id="modalContent" class="p-6 h-full flex flex-col">
            {{-- Contenido del modal se insertará aquí con JS --}}
        </div>
    </div>
</div>

<script>
    function openModal(filePath, fileName, isImage, isPdf) {
        const modal = document.getElementById('previewModal');
        const modalContent = document.getElementById('modalContent');
        
        modalContent.innerHTML = ''; // Limpiar contenido anterior
        
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if (isImage === '1') {
            modalContent.innerHTML = `
                <h3 class="text-xl font-bold mb-4 text-primary">${fileName}</h3>
                <div class="flex-grow flex items-center justify-center">
                    <img src="${filePath}" alt="${fileName}" class="max-w-full max-h-full object-contain rounded-lg">
                </div>
            `;
        } else if (isPdf === '1') {
             modalContent.innerHTML = `
                <h3 class="text-xl font-bold mb-4 text-primary">${fileName}</h3>
                <div class="flex-grow flex items-center justify-center w-full">
                    <iframe src="${filePath}" class="w-full h-[70vh] border-0 rounded-lg"></iframe>
                </div>
            `;
        } else {
             modalContent.innerHTML = `
                <h3 class="text-xl font-bold mb-4 text-primary">${fileName}</h3>
                <div class="flex-grow flex flex-col items-center justify-center text-center text-gray-300">
                    <i class="fas fa-file-alt fa-5x mb-4"></i>
                    <p class="text-xl">Tipo de archivo: <span class="font-bold">${fileExtension}</span></p>
                    <p class="mt-2 text-lg">No se puede mostrar una vista previa de este tipo de archivo.</p>
                    <a href="${filePath}" target="_blank" class="mt-4 inline-flex items-center px-6 py-3 bg-primary text-white text-lg font-medium rounded-full shadow-md hover:bg-linkHover transition-colors duration-300">
                        <i class="fas fa-download mr-3"></i> Descargar Archivo
                    </a>
                </div>
            `;
        }
        
        modal.classList.remove('hidden');
        document.body.classList.add('overflow-hidden');
    }

    function closeModal() {
        const modal = document.getElementById('previewModal');
        modal.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }
</script>
@endsection