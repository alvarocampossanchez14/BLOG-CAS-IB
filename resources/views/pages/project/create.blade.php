@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-8 bg-background rounded-lg shadow-xl my-8">
    <h1 class="text-3xl font-extrabold mb-6 text-center text-text">Crear Nuevo Proyecto CAS</h1>
    <p class="text-center text-textSecondary mb-8">
        Completa los detalles de tu Proyecto Creatividad, Actividad, Servicio (CAS).
    </p>

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

    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="bg-surface p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Información del Proyecto</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-text mb-1">Título del Proyecto <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                </div>

                <div>
                    <label for="location" class="block text-sm font-medium text-text mb-1">Sitio (Ubicación)</label>
                    <input type="text" name="location" id="location" value="{{ old('location') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>

                <div>
                    <label for="start_date" class="block text-sm font-medium text-text mb-1">Fecha de Inicio <span class="text-red-500">*</span></label>
                    <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                </div>

                <div>
                    <label for="end_date" class="block text-sm font-medium text-text mb-1">Fecha de Finalización <span class="text-red-500">*</span></label>
                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                </div>

                <div class="md:col-span-2">
                    <label for="description" class="block text-sm font-medium text-text mb-1">Descripción del Proyecto <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>{{ old('description') }}</textarea>
                </div>
            </div>
        </div>

        <div class="bg-surface p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Información del Supervisor</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="supervisor_name" class="block text-sm font-medium text-text mb-1">Nombre del Supervisor</label>
                    <input type="text" name="supervisor_name" id="supervisor_name" value="{{ old('supervisor_name') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>
                <div>
                    <label for="supervisor_contact" class="block text-sm font-medium text-text mb-1">Contacto del Supervisor</label>
                    <input type="text" name="supervisor_contact" id="supervisor_contact" value="{{ old('supervisor_contact') }}"
                           class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">
                </div>
            </div>
        </div>

        <div class="bg-surface p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Áreas CAS</h2>
            <div class="space-y-4">
                <div>
                    <label for="creativity" class="block text-sm font-medium text-text mb-1">Creatividad</label>
                    <textarea name="creativity" id="creativity" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('creativity') }}</textarea>
                </div>
                <div>
                    <label for="activity" class="block text-sm font-medium text-text mb-1">Actividad</label>
                    <textarea name="activity" id="activity" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('activity') }}</textarea>
                </div>
                <div>
                    <label for="service" class="block text-sm font-medium text-text mb-1">Servicio</label>
                    <textarea name="service" id="service" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('service') }}</textarea>
                </div>
            </div>
        </div>
        
        <div class="bg-surface p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Medios y Evidencias</h2>
            <div class="space-y-4">
                <div>
                    <label for="image" class="block text-sm font-medium text-text mb-1">Imagen de Portada</label>
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

        <div class="bg-surface p-6 rounded-md shadow-md border border-gray-700">
            <h2 class="text-xl font-semibold text-text mb-4">Reflexión, Valoración y Publicación</h2>
            <div class="space-y-6"> {{-- Increased space-y for better visual separation --}}
                
                {{-- Learning Outcomes Checkboxes --}}
                <div>
                    <h3 class="text-lg font-medium text-text mb-3">Resultados de Aprendizaje CAS Adquiridos <span class="text-red-500">*</span></h3>
                    <p class="text-gray-400 text-sm mb-4">Marca los resultados de aprendizaje del IB CAS que se lograron o abordaron en este proyecto.</p>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 text-gray-300">
                        @for ($i = 1; $i <= 7; $i++)
                            <label class="flex items-center space-x-3 bg-gray-700 p-3 rounded-md cursor-pointer hover:bg-gray-600 transition-colors duration-200">
                                <input type="checkbox" name="lo_{{ $i }}" value="1" 
                                       class="form-checkbox h-5 w-5 text-primary rounded focus:ring-primary-dark"
                                       {{ old("lo_$i") ? 'checked' : '' }}>
                                <span class="text-lg font-medium">LO {{ $i }}</span>
                            </label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label for="evaluation_and_objectives" class="block text-sm font-medium text-text mb-1">Valoración y Objetivos</label>
                    <textarea name="evaluation_and_objectives" id="evaluation_and_objectives" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('evaluation_and_objectives') }}</textarea>
                </div>
                <div>
                    <label for="reflection" class="block text-sm font-medium text-text mb-1">Reflexión</label>
                    <textarea name="reflection" id="reflection" rows="4"
                              class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text">{{ old('reflection') }}</textarea>
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-text mb-1">Estado del Proyecto <span class="text-red-500">*</span></label>
                    <select name="status" id="status"
                            class="mt-1 block w-full bg-gray-800 border-gray-600 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 px-3 py-2 text-text" required>
                        <option value="planned" {{ old('status') == 'planned' ? 'selected' : '' }}>Planificado</option>
                        <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>En Curso</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completado</option>
                    </select>
                </div>
                <div>
                    <label for="is_published" class="block text-sm font-medium text-text mb-1">¿Publicar ahora?</label>
                    <input type="checkbox" name="is_published" id="is_published" value="1"
                           class="mt-1 form-checkbox h-5 w-5 text-primary rounded border-gray-600 bg-gray-800"
                           {{ old('is_published') ? 'checked' : '' }}>
                    <span class="ml-2 text-textSecondary text-sm">Marcar para publicar inmediatamente.</span>
                </div>
            </div>
        </div>

        <div class="flex justify-center mt-8">
            <button type="submit" class="px-8 py-3 bg-primary text-white font-semibold rounded-md shadow-lg hover:bg-linkHover transition duration-300 ease-in-out">
                Crear Proyecto CAS
            </button>
        </div>
    </form>
</div>
@endsection