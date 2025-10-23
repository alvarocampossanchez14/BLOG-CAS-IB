@extends('layouts.app')

@section('content')
<article class="min-h-screen text-gray-100 font-sans antialiased">

    {{-- Header Section: Title, Metadata, and Image Preview --}}
    <header class="relative w-full h-[60vh] flex items-end px-6 py-12 md:py-20 border-b border-gray-800 overflow-hidden z-20">
        {{-- Image Preview --}}
        @if ($activity->image && Storage::disk('public')->exists($activity->image))
            <img src="{{ asset('storage/' . $activity->image) }}" alt="Imagen de portada de la actividad" class="absolute inset-0 w-full h-full object-cover opacity-30">
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
                {{ $activity->title }}
            </h1>
            <p class="text-xl sm:text-2xl text-gray-400 font-semibold mt-3 flex items-center">
                <i class="far fa-calendar-alt mr-3 text-primary"></i>
                <span>{{ $activity->date ? \Carbon\Carbon::parse($activity->date)->locale('es')->isoFormat('LL') : 'Fecha no especificada' }}</span>
                @if($activity->location)
                    <span class="mx-4 text-gray-600 hidden sm:inline">|</span>
                    <i class="fas fa-map-marker-alt mr-3 text-primary hidden sm:inline"></i>
                    <span class="hidden sm:inline">{{ $activity->location }}</span>
                @endif
            </p>
        </div>
    </header>

    {{-- Main Content & Sidebar Grid --}}
    <div class="max-w-screen-xl mx-auto px-6 py-16 grid grid-cols-1 lg:grid-cols-3 gap-12">

        {{-- Main Content Column --}}
        <main class="lg:col-span-2 space-y-12">

            {{-- Activity Description Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-info-circle mr-4 text-3xl"></i> Descripción de la Actividad
                </h2>
                <p class="text-lg text-gray-300 leading-relaxed">
                    {{ $activity->description }}
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
                            @if($activity->creativity)
                                <p><strong class="text-gray-200">Creatividad:</strong> <span class="whitespace-pre-wrap">{{ $activity->creativity }}</span></p>
                            @endif
                            @if($activity->activity_text)
                                <p><strong class="text-gray-200">Actividad:</strong> <span class="whitespace-pre-wrap">{{ $activity->activity_text }}</span></p>
                            @endif
                            @if($activity->service)
                                <p><strong class="text-gray-200">Servicio:</strong> <span class="whitespace-pre-wrap">{{ $activity->service }}</span></p>
                            @endif
                            @if (!$activity->creativity && !$activity->activity_text && !$activity->service)
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
                                @if ($activity->{"lo_$i"})
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
                    @if($activity->reflection)
                    <div class="text-lg text-gray-300">
                        <strong class="block mb-2 text-gray-200"><i class="fas fa-pen-alt mr-2"></i> Reflexión:</strong>
                        <p class="whitespace-pre-wrap leading-relaxed">{{ $activity->reflection }}</p>
                    </div>
                    @endif
                    @if($activity->evaluation)
                    <div class="text-lg text-gray-300 pt-6 border-t border-gray-700">
                        <strong class="block mb-2 text-gray-200"><i class="fas fa-star mr-2"></i> Valoración:</strong>
                        <p class="whitespace-pre-wrap leading-relaxed">{{ $activity->evaluation }}</p>
                    </div>
                    @endif
                    @if (!$activity->reflection && !$activity->evaluation)
                        <p class="text-gray-400 text-center py-4">No hay reflexión o valoración para esta actividad.</p>
                    @endif
                </div>
            </section>

            {{-- Evidences Gallery Card --}}
            <section class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h2 class="text-3xl font-bold mb-6 text-primary flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-camera-retro mr-4 text-3xl"></i> Galería de Evidencias
                </h2>
                @if ($activity->evidences->isEmpty())
                    <p class="text-lg text-gray-400 text-center py-4">No hay evidencias subidas para esta actividad.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($activity->evidences as $evidence)
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

            {{-- Supervisor & Project Info Card --}}
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-2xl font-bold text-primary mb-5 flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-user-tie mr-3"></i> Información Adicional
                </h3>
                <div class="space-y-4">
                    <p class="text-lg text-gray-300 flex items-center">
                        <i class="fas fa-user-circle mr-3 text-primary"></i>
                        <strong class="mr-2">Supervisor:</strong> <span class="flex-grow">{{ $activity->supervisor_name ?? 'No especificado' }}</span>
                    </p>
                    <p class="text-lg text-gray-300 flex items-center">
                        <i class="fas fa-envelope mr-3 text-primary"></i>
                        <strong class="mr-2">Contacto:</strong> <span class="flex-grow">{{ $activity->supervisor_contact ?? 'No especificado' }}</span>
                    </p>
                    @if($activity->project)
                    <div class="pt-4 border-t border-gray-700">
                        <p class="text-lg text-gray-300 flex items-center mb-2">
                            <i class="fas fa-project-diagram mr-3 text-primary"></i>
                            <strong class="mr-2">Proyecto:</strong>
                        </p>
                        <a href="{{ route('projects.show', $activity->project->slug) }}" class="inline-flex items-center text-primary hover:text-linkHover transition duration-300">
                            {{ $activity->project->title }}
                            <i class="fas fa-external-link-alt ml-2 text-sm"></i>
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            {{-- More Activities Card --}}
            <div class="bg-gray-800 p-8 rounded-xl shadow-lg border border-gray-700">
                <h3 class="text-2xl font-bold text-primary mb-6 flex items-center border-b pb-4 border-gray-700">
                    <i class="fas fa-compass mr-3"></i> Más Actividades
                </h3>
                <ul class="space-y-8">
                    @forelse($recentActivities as $recentActivity)
                        <li class="bg-gray-700 p-4 rounded-xl shadow-md transform hover:scale-[1.02] hover:bg-gray-600 transition duration-300">
                           <a href="{{ route('activities.show', $recentActivity->id) }}" class="flex space-x-5 items-start group w-full">
                                @if ($recentActivity->image && Storage::disk('public')->exists($recentActivity->image))
                                    <img src="{{ asset('storage/' . $recentActivity->image) }}" alt="{{ $recentActivity->title }}" class="w-24 h-24 rounded-lg object-cover flex-shrink-0 border-2 border-primary">
                                @else
                                    <div class="w-24 h-24 rounded-lg bg-gray-600 flex items-center justify-center text-gray-400 flex-shrink-0 border-2 border-primary">
                                        <i class="fas fa-image fa-2x text-gray-400"></i>
                                    </div>
                                @endif
                                <div class="flex-grow">
                                    <h4 class="font-bold text-white text-lg leading-tight mb-1 group-hover:text-primary transition-colors duration-200">{{ Str::limit($recentActivity->title, 40) }}</h4>
                                    <p class="text-sm text-gray-400 flex items-center mb-1"><i class="far fa-calendar-alt mr-2 text-gray-500"></i>{{ \Carbon\Carbon::parse($recentActivity->date)->format('d/m/Y') }}</p>
                                </div>
                           </a>
                        </li>
                    @empty
                        <p class="text-gray-400 text-center py-4">No hay otras actividades recientes disponibles.</p>
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