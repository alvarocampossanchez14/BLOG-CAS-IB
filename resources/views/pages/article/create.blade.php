@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Crear Nuevo Artículo</h1>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data" class="text-black">
        @csrf
        
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-text">Título</label>
            <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-text">Imagen</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 text-white rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-text">Categoría</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required>
                <option value="">Selecciona una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-text">Etiquetas</label>
            <select name="tags[]" id="tags" multiple class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required>
                <option value="">Selecciona un tag</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-text">Descripción de la Actividad</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-sm font-medium text-text">Propósito y Objetivos</label>
            <textarea name="purpose" id="purpose" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="reflections" class="block text-sm font-medium text-text">Aprendizajes y Reflexiones</label>
            <textarea name="reflections" id="reflections" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="creativity" class="block text-sm font-medium text-text">Creatividad</label>
            <textarea name="creativity" id="creativity" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="activity" class="block text-sm font-medium text-text">Actividad</label>
            <textarea name="activity" id="activity" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="service" class="block text-sm font-medium text-text">Servicio</label>
            <textarea name="service" id="service" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="context" class="block text-sm font-medium text-text">Contexto y Relevancia</label>
            <textarea name="context" id="context" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="evaluation" class="block text-sm font-medium text-text">Evaluación de la Actividad</label>
            <textarea name="evaluation" id="evaluation" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="sustainability" class="block text-sm font-medium text-text">Sostenibilidad</label>
            <textarea name="sustainability" id="sustainability" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required></textarea>
        </div>

        <div class="mb-4">
            <label for="visual_documentation" class="block text-sm font-medium text-text">Documentación Visual</label>
            <input type="file" name="visual_documentation" id="visual_documentation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required>
        </div>

        <div class="mb-4">
            <label for="visual_caption" class="block text-sm font-medium text-text">Pie de Foto de Documentación Visual</label>
            <input type="text" name="visual_caption" id="visual_caption" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50 px-2 py-1" required>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary/75">Crear Artículo</button>
    </form>
</div>
@endsection
