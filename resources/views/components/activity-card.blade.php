<div class="bg-surface rounded-xl shadow-lg border border-gray-700 overflow-hidden transform transition-all duration-300 hover:scale-[1.02] hover:shadow-2xl">
    <a href="{{ route('activities.show', $activity) }}" class="block">
        <div class="relative w-full h-56">
            @if ($activity->image && Storage::disk('public')->exists($activity->image))
                <img src="{{ asset('storage/' . $activity->image) }}" alt="Imagen de la actividad {{ $activity->title }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
            @else
                <div class="w-full h-full bg-gray-800 flex items-center justify-center text-gray-400">
                    <i class="fas fa-image fa-3x"></i>
                </div>
            @endif
        </div>
        <div class="p-6">
            <div class="flex justify-between items-center mb-2">
                <h3 class="text-xl font-bold text-white leading-tight capitalize">{{ $activity->title }}</h3>
            </div>
            <p class="text-sm text-textSecondary mt-2">
                <i class="far fa-calendar-alt mr-2 text-primary"></i>
                {{ $activity->date ? \Carbon\Carbon::parse($activity->date)->locale('es')->isoFormat('LL') : 'Fecha no especificada' }}
            </p>
        </div>
    </a>
</div>
