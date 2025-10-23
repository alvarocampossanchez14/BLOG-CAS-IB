<div class="bg-surface rounded-xl shadow-lg border border-gray-700 overflow-hidden transform transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl">
    <a href="{{ route('projects.show', $project->slug) }}" class="block">
        <div class="relative w-full h-56">
            @if ($project->image && Storage::disk('public')->exists($project->image))
                <img src="{{ asset('storage/' . $project->image) }}" alt="Imagen del proyecto {{ $project->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            @else
                <div class="w-full h-full bg-gray-800 flex items-center justify-center text-gray-400">
                    <i class="fas fa-image fa-3x"></i>
                </div>
            @endif
        </div>
        <div class="p-6">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-xl font-bold text-white leading-tight capitalize">{{ $project->title }}</h3>
                @php
                    $statusColors = [
                        'planned' => 'bg-blue-600',
                        'in_progress' => 'bg-yellow-600',
                        'completed' => 'bg-green-600',
                    ];
                    $statusText = [
                        'planned' => 'Planificación',
                        'in_progress' => 'En Curso',
                        'completed' => 'Completado',
                    ];
                @endphp
                <span class="text-xs font-semibold px-2 py-1 rounded-full {{ $statusColors[$project->status] ?? 'bg-gray-500' }} text-white uppercase tracking-wider">
                    {{ $statusText[$project->status] ?? 'Desconocido' }}
                </span>
            </div>
            <p class="text-sm text-textSecondary mt-2">
                <i class="far fa-calendar-alt mr-2 text-primary"></i>
                {{ $project->start_date }} - {{ $project->end_date }}
            </p>
        </div>
    </a>
</div>