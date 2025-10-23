@extends('layouts.app')

@section('title', 'Proyectos CAS IB | Blog CAS del Bachillerato Internacional')

@section('meta_description', 'Explora proyectos CAS (Creatividad, Actividad y Servicio) del Programa del Diploma del IB. Descubre experiencias enriquecedoras y reflexiones sobre las actividades CAS.')

@section('meta_tags')
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "CollectionPage",
      "name": "Proyectos CAS",
      "description": "Lista de todos los proyectos de Creatividad, Actividad y Servicio (CAS).",
      "mainEntity": {
        "@type": "ItemList",
        "itemListElement": [
          @foreach ($projects as $key => $project)
          {
            "@type": "ListItem",
            "position": {{ $key + 1 }},
            "item": {
              "@type": "Project",
              "name": "{{ $project->title }}",
              "description": "{{ Str::limit($project->description, 100) }}",
              "url": "{{ route('projects.show', $project->slug) }}",
              "image": "{{ $project->image ? asset('storage/' . $project->image) : '' }}"
            }
          }{{ $loop->last ? '' : ',' }}
          @endforeach
        ]
      }
    }
    </script> -->
@endsection

@section('content')
<main class="min-h-screen text-text bg-background/10">
    {{-- Header/Hero Section --}}
    <div class="bg-surface/40 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                Explora todos los Proyectos
            </h1>
            <p class="mt-4 text-xl text-textSecondary max-w-2xl">
                Descubre los proyectos de Creatividad, Actividad y Servicio (CAS) completados.
            </p>
        </div>
    </div>
    
    <div class="max-w-7xl mx-auto px-4 py-12">
        {{-- Success Message --}}
        @if (session('success'))
            <div class="mb-6 bg-green-800/30 border border-green-700 text-green-300 px-4 py-3 rounded-lg relative transition-all duration-300 transform scale-y-100 origin-top">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filters and Actions --}}
        <div class="flex flex-col sm:flex-row justify-between items-center mb-8 gap-4">
            {{-- Search and Filter Form --}}
            <form action="{{ route('projects.index') }}" method="GET" class="w-full sm:w-auto flex-grow flex items-center gap-4">
                <div class="relative w-full sm:w-auto">
                    <input type="text" name="search" placeholder="Buscar proyectos..." value="{{ request('search') }}"
                           class="w-full bg-gray-800 border border-gray-600 rounded-lg py-2 pl-10 pr-4 text-text placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                    <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                </div>
                <div class="w-full sm:w-auto">
                    <select name="status" onchange="this.form.submit()"
                            class="w-full bg-gray-800 border border-gray-600 rounded-lg py-2 px-3 text-text focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-colors duration-200">
                        <option value="">Todos los Estados</option>
                        <option value="planning" {{ request('status') == 'planned' ? 'selected' : '' }}>En Planificación</option>
                        <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>En Curso</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completado</option>
                    </select>
                </div>
            </form>

            {{-- New Project Button --}}
            @if(Auth::user())
                <div class="flex gap-2">
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-bold rounded-lg shadow-lg text-white transition-all duration-300 transform
                    bg-gradient-to-r from-primary to-linkHover hover:from-linkHover hover:to-primary hover:scale-105 hover:shadow-xl
                    focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background">
                        <i class="fas fa-user mr-3"></i>  Acceder al panel de administrador
                    </a>

                    <a href="{{ route('projects.create') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-bold rounded-lg shadow-lg text-white transition-all duration-300 transform
                    bg-gradient-to-r from-primary to-linkHover hover:from-linkHover hover:to-primary hover:scale-105 hover:shadow-xl
                    focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background">
                        <i class="fas fa-plus mr-3"></i> Nuevo Proyecto
                    </a>
                </div>
            @endif
        </div>

        {{-- Projects Grid --}}
        @if ($projects->isEmpty())
            <div class="bg-surface p-12 rounded-lg shadow-lg border border-gray-700 text-center flex flex-col items-center">
                <i class="fas fa-box-open text-6xl text-primary mb-4"></i>
                <h2 class="text-2xl font-bold text-text mb-2">¡Ups! No se encontraron proyectos.</h2>
                <p class="text-textSecondary text-lg mb-4">Ajusta tus filtros o busca algo diferente.</p>
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-6 py-3 border border-transparent text-sm font-bold rounded-lg shadow-md text-white transition-all duration-300 bg-gray-600 hover:bg-gray-700">
                    Reiniciar Búsqueda
                </a>
            </div>
        @else
            <div class="mt-8 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        @endif
    </div>
</main>
@endsection