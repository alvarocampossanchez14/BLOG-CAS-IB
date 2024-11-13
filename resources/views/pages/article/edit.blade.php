@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Editar Artículo</h1>

    <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <!-- Método PUT para la actualización -->

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
            <input type="text" name="title" id="title" value="{{ old('title', $article->title) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
            <textarea name="content" id="content" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="image" class="block text-sm font-medium text-gray-700">Imagen (dejar en blanco si no deseas cambiar)</label>
            <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            @if($article->image)
                <img src="{{ asset('storage/images/' . $article->image) }}" alt="Imagen actual" class="mt-2 w-full h-auto rounded-md">
            @endif
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                <option value="">Selecciona una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="tags" class="block text-sm font-medium text-gray-700">Etiquetas</label>
            <select name="tags[]" id="tags" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" multiple required>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" {{ in_array($tag->id, $article->tags->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Descripción de la Actividad</label>
            <textarea name="description" id="description" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('description', $article->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="purpose" class="block text-sm font-medium text-gray-700">Propósito y Objetivos</label>
            <textarea name="purpose" id="purpose" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('purpose', $article->purpose) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="reflections" class="block text-sm font-medium text-gray-700">Aprendizajes y Reflexiones</label>
            <textarea name="reflections" id="reflections" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('reflections', $article->reflections) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="creativity" class="block text-sm font-medium text-gray-700">Creatividad</label>
            <textarea name="creativity" id="creativity" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('creativity', $article->creativity) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="activity" class="block text-sm font-medium text-gray-700">Actividad</label>
            <textarea name="activity" id="activity" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('activity', $article->activity) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="service" class="block text-sm font-medium text-gray-700">Servicio</label>
            <textarea name="service" id="service" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('service', $article->service) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="context" class="block text-sm font-medium text-gray-700">Contexto y Relevancia</label>
            <textarea name="context" id="context" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('context', $article->context) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="evaluation" class="block text-sm font-medium text-gray-700">Evaluación de la Actividad</label>
            <textarea name="evaluation" id="evaluation" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('evaluation', $article->evaluation) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="sustainability" class="block text-sm font-medium text-gray-700">Sostenibilidad</label>
            <textarea name="sustainability" id="sustainability" rows="3" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>{{ old('sustainability', $article->sustainability) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="visual_documentation" class="block text-sm font-medium text-gray-700">Documentación Visual (dejar en blanco si no deseas cambiar)</label>
            <input type="file" name="visual_documentation" id="visual_documentation" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            @if($article->visual_documentation)
                <img src="{{ asset('storage/visual_documentation/' . $article->visual_documentation) }}" alt="Documentación visual actual" class="mt-2 w-full h-auto rounded-md">
            @endif
        </div>

        <div class="mb-4">
            <label for="visual_caption" class="block text-sm font-medium text-gray-700">Pie de Foto de Documentación Visual</label>
            <input type="text" name="visual_caption" id="visual_caption" value="{{ old('visual_caption', $article->visual_caption) }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
        </div>

        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-500">Actualizar Artículo</button>
    </form>
</div>
@endsection
