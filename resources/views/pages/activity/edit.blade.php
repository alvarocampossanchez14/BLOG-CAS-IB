@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 rounded-lg shadow-xl my-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-text">Editar Actividad</h1>

    @if ($errors->any())
        <div class="mb-6 bg-red-800 bg-opacity-30 border border-red-700 text-red-300 px-4 py-3 rounded relative">
            <strong class="font-bold">¡Oops!</strong> Hay algunos problemas con tu envío:
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('activities.update', $activity) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Información General</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-text mb-1">Título de la Actividad <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $activity->title) }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                </div>
                <div>
                    <label for="location" class="block text-sm font-medium text-text mb-1">Sitio (Ubicación)</label>
                    <input type="text" name="location" id="location" value="{{ old('location', $activity->location) }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>
                <div class="md:col-span-2">
                    <label for="date" class="block text-sm font-medium text-text mb-1">Fecha de la Actividad <span class="text-red-500">*</span></label>
                    <input type="date" name="date" id="date" value="{{ old('date', $activity->date) }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                </div>
                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-text mb-1">Descripción <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>{{ old('description', $activity->description) }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Información del Supervisor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="supervisor_name" class="block text-sm font-medium text-text mb-1">Nombre del Supervisor</label>
                    <input type="text" name="supervisor_name" id="supervisor_name" value="{{ old('supervisor_name', $activity->supervisor_name) }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>
                <div>
                    <label for="supervisor_contact" class="block text-sm font-medium text-text mb-1">Contacto del Supervisor</label>
                    <input type="text" name="supervisor_contact" id="supervisor_contact" value="{{ old('supervisor_contact', $activity->supervisor_contact) }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>
            </div>
        </div>

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Áreas CAS</h2>
            <div class="space-y-4">
                <div>
                    <label for="creativity" class="block text-sm font-medium text-text mb-1">Creatividad</label>
                    <textarea name="creativity" id="creativity" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('creativity', $activity->creativity) }}</textarea>
                </div>
                <div>
                    <label for="activity" class="block text-sm font-medium text-text mb-1">Actividad</label>
                    <textarea name="activity" id="activity" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('activity', $activity->activity) }}</textarea>
                </div>
                <div>
                    <label for="service" class="block text-sm font-medium text-text mb-1">Servicio</label>
                    <textarea name="service" id="service" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('service', $activity->service) }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Medios y Evidencias</h2>
            <div class="space-y-4">
                <div>
                    <label for="image" class="block text-sm font-medium text-text mb-1">Imagen de Portada</label>
                    @if($activity->image)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $activity->image) }}" alt="Portada actual" class="h-24 w-auto rounded border border-gray-700">
                        </div>
                    @endif
                    <input type="file" name="image" id="image"
                           class="mt-1 block w-full bg-gray-800 text-text border-gray-600 rounded-md shadow-sm focus:ring-primary focus:ring-opacity-50 py-1.5" accept="image/*">
                    <p class="mt-1 text-xs text-textSecondary">Solo una imagen. Máx. 2MB.</p>
                </div>
                <div>
                    <label for="evidences" class="block text-sm font-medium text-text mb-1">Evidencias (múltiples archivos)</label>
                    <input type="file" name="evidences[]" id="evidences" multiple
                           class="mt-1 block w-full bg-gray-800 text-text border-gray-600 rounded-md shadow-sm focus:ring-primary focus:ring-opacity-50 py-1.5">
                    <p class="mt-1 text-xs text-textSecondary">Selecciona imágenes, PDFs, etc. Máx. 10MB por archivo.</p>
                </div>
            </div>
        </div>

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Reflexión y Valoración</h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium text-text mb-3">Resultados de Aprendizaje CAS Adquiridos <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400 text-sm mb-4">Marca los resultados de aprendizaje del IB CAS que se lograron o abordaron en esta actividad.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-300">
                        @for ($i = 1; $i <= 7; $i++)
                            <label class="flex items-center space-x-3 bg-gray-700 p-3 rounded-md cursor-pointer hover:bg-gray-600 transition-colors duration-200">
                                <input type="checkbox" name="lo_{{ $i }}" value="1" 
                                       class="form-checkbox h-5 w-5 text-primary rounded focus:ring-primary-dark"
                                       {{ old("lo_$i", $activity->{"lo_$i"}) ? 'checked' : '' }}>
                                <span class="text-lg font-medium">LO {{ $i }}</span>
                            </label>
                        @endfor
                    </div>
                </div>
                <div>
                    <label for="evaluation" class="block text-sm font-medium text-text mb-1">Valoración</label>
                    <textarea name="evaluation" id="evaluation" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('evaluation', $activity->evaluation) }}</textarea>
                </div>
                <div>
                    <label for="reflection" class="block text-sm font-medium text-text mb-1">Reflexión</label>
                    <textarea name="reflection" id="reflection" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('reflection', $activity->reflection) }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-surface/20 p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Relación con Proyecto</h2>
            <div>
                <label for="project_id" class="block text-sm font-medium text-text mb-1">Proyecto Relacionado (Opcional)</label>
                <select name="project_id" id="project_id" class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                    <option value="">-- Sin proyecto --</option>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id', $activity->project_id) == $project->id ? 'selected' : '' }}>
                            {{ $project->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="flex justify-center mt-8 gap-4">
            <a href="{{ route('activities.index') }}" class="px-6 py-3 bg-gray-600 text-white font-semibold rounded-md shadow-lg hover:bg-gray-700 transition duration-300">
                Cancelar
            </a>
            <button type="submit" class="px-6 py-3 bg-primary text-white font-semibold rounded-md shadow-lg hover:bg-linkHover transition duration-300">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection