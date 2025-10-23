@extends('layouts.app')

@section('content')
<div class="min-h-screen py-10">
    {{-- Header / Bienvenida --}}
    <div class="border-b border-gray-800/60 bg-gradient-to-b from-gray-900/40 to-transparent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6">
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-text">
                        Dashboard de Gestión CAS
                    </h1>
                    <p class="mt-2 text-textSecondary">
                        ¡Bienvenido de nuevo, <span class="font-semibold text-text">{{ Auth::user()->name }}</span>! Gestiona tus proyectos y actividades CAS desde un solo lugar.
                    </p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('projects.create') }}"
                       class="inline-flex items-center gap-2 rounded-xl px-4 py-2 bg-primary text-white font-semibold shadow hover:bg-linkHover transition">
                        <i class="fas fa-plus-circle"></i>
                        <span>Nuevo Proyecto</span>
                    </a>
                    <a href="{{ route('activities.create') }}"
                       class="inline-flex items-center gap-2 rounded-xl px-4 py-2 bg-secondary text-white font-semibold shadow hover:opacity-90 transition">
                        <i class="fas fa-bolt"></i>
                        <span>Nueva Actividad</span>
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="inline-flex items-center gap-2 rounded-xl px-4 py-2 bg-red-600 text-white font-semibold shadow hover:bg-red-700 transition">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Cerrar sesión</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- KPIs / Métricas --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-6">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="relative overflow-hidden rounded-2xl border border-gray-800/60 bg-gray-900/60 p-5 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-textSecondary text-sm">Proyectos Totales</p>
                        <p class="text-4xl font-extrabold text-primary mt-1">{{ $totalProjects }}</p>
                    </div>
                    <div class="h-12 w-12 grid place-items-center rounded-xl bg-primary/10">
                        <i class="fas fa-folder-open text-primary"></i>
                    </div>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-2xl border border-gray-800/60 bg-gray-900/60 p-5 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-textSecondary text-sm">En Curso</p>
                        <p class="text-4xl font-extrabold text-yellow-400 mt-1">{{ $ongoingProjects }}</p>
                    </div>
                    <div class="h-12 w-12 grid place-items-center rounded-xl bg-yellow-400/10">
                        <i class="fas fa-spinner text-yellow-400"></i>
                    </div>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-2xl border border-gray-800/60 bg-gray-900/60 p-5 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-textSecondary text-sm">Completados</p>
                        <p class="text-4xl font-extrabold text-green-400 mt-1">{{ $completedProjects }}</p>
                    </div>
                    <div class="h-12 w-12 grid place-items-center rounded-xl bg-green-400/10">
                        <i class="fas fa-check-circle text-green-400"></i>
                    </div>
                </div>
            </div>
            <div class="relative overflow-hidden rounded-2xl border border-gray-800/60 bg-gray-900/60 p-5 shadow hover:shadow-lg transition">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-textSecondary text-sm">Publicados</p>
                        <p class="text-4xl font-extrabold text-secondary mt-1">{{ $publishedProjects }}</p>
                    </div>
                    <div class="h-12 w-12 grid place-items-center rounded-xl bg-secondary/10">
                        <i class="fas fa-bullhorn text-secondary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bloques: Proyectos y Actividades --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10 space-y-10">

        {{-- Sección Proyectos --}}
        <section class="rounded-2xl border border-gray-800/60 bg-surface shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 p-6 border-b border-gray-800/60">
                <div class="flex items-center gap-3">
                    <span class="h-10 w-10 grid place-items-center rounded-xl bg-primary/10">
                        <i class="fas fa-diagram-project text-primary"></i>
                    </span>
                    <div>
                        <h2 class="text-2xl font-semibold text-text">Proyectos</h2>
                        <p class="text-sm text-textSecondary">Crea, edita y publica tus proyectos.</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('projects.index') }}"
                       class="inline-flex items-center gap-2 rounded-lg px-3.5 py-2 bg-gray-700 text-white hover:bg-gray-600 transition">
                        <i class="fas fa-list-alt"></i><span>Ver Proyectos</span>
                    </a>
                    <a href="{{ route('projects.create') }}"
                       class="inline-flex items-center gap-2 rounded-lg px-3.5 py-2 bg-primary text-white hover:bg-linkHover transition">
                        <i class="fas fa-plus-circle"></i><span>Nuevo Proyecto</span>
                    </a>
                </div>
            </div>

            {{-- Sub-métricas compactas --}}
            <div class="px-6 py-5">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="rounded-xl border border-gray-800/60 bg-gray-900/40 p-4">
                        <p class="text-xs text-textSecondary">Totales</p>
                        <p class="text-2xl font-bold text-text mt-1">{{ $totalProjects }}</p>
                    </div>
                    <div class="rounded-xl border border-gray-800/60 bg-gray-900/40 p-4">
                        <p class="text-xs text-textSecondary">Planificados</p>
                        <p class="text-2xl font-bold text-blue-400 mt-1">
                            {{ $plannedProjects ?? ($totalProjects - $ongoingProjects - $completedProjects) }}
                        </p>
                    </div>
                    <div class="rounded-xl border border-gray-800/60 bg-gray-900/40 p-4">
                        <p class="text-xs text-textSecondary">En curso</p>
                        <p class="text-2xl font-bold text-yellow-400 mt-1">{{ $ongoingProjects }}</p>
                    </div>
                    <div class="rounded-xl border border-gray-800/60 bg-gray-900/40 p-4">
                        <p class="text-xs text-textSecondary">Publicados</p>
                        <p class="text-2xl font-bold text-secondary mt-1">{{ $publishedProjects }}</p>
                    </div>
                </div>
            </div>

            {{-- Proyectos recientes --}}
            <div class="px-6 pb-6">
                <h3 class="text-lg font-semibold text-text mb-3 flex items-center gap-2">
                    <i class="fas fa-history text-primary"></i> Proyectos recientes
                </h3>

                @if ($recentProjects->isEmpty())
                    <div class="rounded-xl border border-dashed border-gray-700 p-8 text-center">
                        <p class="text-textSecondary">No hay proyectos recientes.</p>
                        <a href="{{ route('projects.create') }}" class="inline-flex items-center gap-2 mt-3 px-3.5 py-2 rounded-lg bg-primary text-white hover:bg-linkHover transition">
                            <i class="fas fa-plus-circle"></i><span>Crear el primero</span>
                        </a>
                    </div>
                @else
                    <div class="overflow-hidden rounded-xl border border-gray-800/60">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-800/80">
                                <thead class="bg-gray-800/60 backdrop-blur supports-backdrop-blur sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Título</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Estado</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Publicado</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800 bg-gray-900/30">
                                @foreach ($recentProjects as $project)
                                    <tr class="hover:bg-gray-900/60 transition">
                                        <td class="px-6 py-4 text-sm font-medium text-text">
                                            {{ Str::limit($project->title, 60) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($project->status == 'planned')
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-500/15 text-blue-300 ring-1 ring-inset ring-blue-500/30">Planificado</span>
                                            @elseif ($project->status == 'ongoing')
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-yellow-500/15 text-yellow-300 ring-1 ring-inset ring-yellow-500/30">En curso</span>
                                            @else
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-green-500/15 text-green-300 ring-1 ring-inset ring-green-500/30">Completado</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($project->is_published)
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-secondary/15 text-secondary ring-1 ring-inset ring-secondary/30">Sí</span>
                                            @else
                                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-red-500/15 text-red-300 ring-1 ring-inset ring-red-500/30">No</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('projects.show', $project->slug) }}" class="text-primary hover:text-linkHover" title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('projects.edit', $project) }}" class="text-yellow-400 hover:text-yellow-300" title="Editar">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar este proyecto?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-400" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Vista responsive tipo "cards" para móviles --}}
                        <div class="md:hidden divide-y divide-gray-800">
                            @foreach ($recentProjects as $project)
                                <div class="p-4">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-text">{{ Str::limit($project->title, 80) }}</p>
                                            <div class="mt-2 flex items-center gap-2">
                                                @if ($project->status == 'planned')
                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-blue-500/15 text-blue-300 ring-1 ring-blue-500/30">Planificado</span>
                                                @elseif ($project->status == 'ongoing')
                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-yellow-500/15 text-yellow-300 ring-1 ring-yellow-500/30">En curso</span>
                                                @else
                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-green-500/15 text-green-300 ring-1 ring-green-500/30">Completado</span>
                                                @endif

                                                @if($project->is_published)
                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-secondary/15 text-secondary ring-1 ring-secondary/30">Publicado</span>
                                                @else
                                                    <span class="px-2 py-0.5 text-xs rounded-full bg-red-500/15 text-red-300 ring-1 ring-red-500/30">No publicado</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('projects.show', $project->slug) }}" class="text-primary hover:text-linkHover">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('projects.edit', $project) }}" class="text-yellow-400 hover:text-yellow-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST"
                                                  onsubmit="return confirm('¿Eliminar este proyecto?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
            </div>
        </section>

        {{-- Sección Actividades --}}
        <section class="rounded-2xl border border-gray-800/60 bg-surface shadow-xl">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 p-6 border-b border-gray-800/60">
                <div class="flex items-center gap-3">
                    <span class="h-10 w-10 grid place-items-center rounded-xl bg-primary/10">
                        <i class="fas fa-tasks text-primary"></i>
                    </span>
                    <div>
                        <h2 class="text-2xl font-semibold text-text">Actividades</h2>
                        <p class="text-sm text-textSecondary">Registra y asocia tus actividades a proyectos.</p>
                    </div>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('activities.index') }}"
                       class="inline-flex items-center gap-2 rounded-lg px-3.5 py-2 bg-gray-700 text-white hover:bg-gray-600 transition">
                        <i class="fas fa-list-alt"></i><span>Ver Actividades</span>
                    </a>
                    <a href="{{ route('activities.create') }}"
                       class="inline-flex items-center gap-2 rounded-lg px-3.5 py-2 bg-primary text-white hover:bg-linkHover transition">
                        <i class="fas fa-plus-circle"></i><span>Nueva Actividad</span>
                    </a>
                </div>
            </div>

            {{-- Métrica simple --}}
            <div class="px-6 py-5">
                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
                    <div class="rounded-xl border border-gray-800/60 bg-gray-900/40 p-4 col-span-2 sm:col-span-1">
                        <p class="text-xs text-textSecondary">Actividades Totales</p>
                        <p class="text-2xl font-bold text-text mt-1">{{ $totalActivities }}</p>
                    </div>
                </div>
            </div>

            {{-- Actividades recientes --}}
            <div class="px-6 pb-6">
                <h3 class="text-lg font-semibold text-text mb-3 flex items-center gap-2">
                    <i class="fas fa-clock text-primary"></i> Actividades recientes
                </h3>

                @if ($recentActivities->isEmpty())
                    <div class="rounded-xl border border-dashed border-gray-700 p-8 text-center">
                        <p class="text-textSecondary">No hay actividades recientes.</p>
                        <a href="{{ route('activities.create') }}" class="inline-flex items-center gap-2 mt-3 px-3.5 py-2 rounded-lg bg-primary text-white hover:bg-linkHover transition">
                            <i class="fas fa-plus-circle"></i><span>Crear actividad</span>
                        </a>
                    </div>
                @else
                    <div class="overflow-hidden rounded-xl border border-gray-800/60">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-800/80">
                                <thead class="bg-gray-800/60 backdrop-blur supports-backdrop-blur sticky top-0">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Título</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Proyecto</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Fecha</th>
                                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-300 uppercase">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-800 bg-gray-900/30">
                                @foreach ($recentActivities as $activity)
                                    <tr class="hover:bg-gray-900/60 transition">
                                        <td class="px-6 py-4 text-sm font-medium text-text">
                                            {{ Str::limit($activity->title, 60) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-textSecondary">
                                            @if($activity->project)
                                                <a href="{{ route('projects.show', $activity->project) }}" class="text-primary hover:underline">
                                                    {{ Str::limit($activity->project->title, 30) }}
                                                </a>
                                            @else
                                                <span class="text-gray-400">Sin proyecto</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-textSecondary">
                                            {{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <div class="flex items-center gap-3">
                                                <a href="{{ route('activities.show', $activity) }}" class="text-primary hover:text-linkHover" title="Ver">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('activities.edit', $activity) }}" class="text-yellow-400 hover:text-yellow-300" title="Editar">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                                <form action="{{ route('activities.destroy', $activity) }}" method="POST"
                                                      onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta actividad?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-500 hover:text-red-400" title="Eliminar">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        {{-- Cards para móvil --}}
                        <div class="md:hidden divide-y divide-gray-800">
                            @foreach ($recentActivities as $activity)
                                <div class="p-4">
                                    <div class="flex items-start justify-between gap-3">
                                        <div>
                                            <p class="font-semibold text-text">{{ Str::limit($activity->title, 80) }}</p>
                                            <div class="mt-2 space-y-1 text-sm text-textSecondary">
                                                <div>
                                                    <span class="text-gray-400">Proyecto:</span>
                                                    @if($activity->project)
                                                        <a href="{{ route('projects.show', $activity->project) }}" class="text-primary hover:underline">
                                                            {{ Str::limit($activity->project->title, 40) }}
                                                        </a>
                                                    @else
                                                        Sin proyecto
                                                    @endif
                                                </div>
                                                <div>
                                                    <span class="text-gray-400">Fecha:</span>
                                                    {{ \Carbon\Carbon::parse($activity->date)->format('d/m/Y') }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('activities.show', $activity) }}" class="text-primary hover:text-linkHover">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('activities.edit', $activity) }}" class="text-yellow-400 hover:text-yellow-300">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>
                                            <form action="{{ route('activities.destroy', $activity) }}" method="POST"
                                                  onsubmit="return confirm('¿Eliminar esta actividad?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-400">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endif
            </div>
        </section>
    </div>
</div>
@endsection
