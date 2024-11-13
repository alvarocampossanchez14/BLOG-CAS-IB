@extends('layouts.app')

@section('content')
<article class="min-h-screen bg-background text-gray-100">
    <div class="relative h-[60vh] overflow-hidden">
        <img src="{{ asset('storage/' . $article->image) }}" alt="Article header" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6 sm:p-8 md:p-12">
            <div class="max-w-screen-xl mx-auto">
                <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight mb-4">
                    {{ $article->title }}
                </h1>
                <p class="text-xl text-gray-300">
                    {{ $article->content }}
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto px-6 py-12">
        <div class="flex flex-col lg:flex-row lg:space-x-12">
            <main class="lg:w-2/3">
                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Descripción de la Actividad</h2>
                    <p class="text-lg">
                        {{ $article->description }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Propósito y Objetivos</h2>
                    <p class="text-lg">
                        {{ $article->purpose }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Aprendizajes y Reflexiones</h2>
                    <p class="text-lg">
                        {{ $article->reflections }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Conexión con el Programa CAS</h2>
                    <ul class="list-disc ml-6">
                        <li class="mb-4"><strong>Creatividad:</strong> {{ $article->creativity }}</li>
                        <li class="mb-4"><strong>Actividad:</strong> {{ $article->activity }}</li>
                        <li><strong>Servicio:</strong> {{ $article->service }}</li>
                    </ul>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Contexto y Relevancia</h2>
                    <p class="text-lg">
                        {{ $article->context }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Evaluación de la Actividad</h2>
                    <p class="text-lg">
                        {{ $article->evaluation }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Sostenibilidad</h2>
                    <p class="text-lg">
                        {{ $article->sustainability }}
                    </p>
                </section>

                <section class="mb-8">
                    <h2 class="text-3xl font-bold mb-4">Documentación Visual</h2>
                    <img src="{{ asset('storage/' . $article->visual_documentation) }}" alt="Documentación visual de la actividad" class="mb-4 rounded-lg shadow-lg">
                    <p class="text-gray-400">{{ $article->visual_caption }}</p>
                </section>

                <div class="max-w-screen-xl mx-auto px-6 py-12">
                    <h3 class="text-2xl font-bold text-white mb-4">Comentarios</h3>
                    <form action="#" method="POST" class="mb-4">
                        @csrf
                        <textarea class="w-full p-2 rounded-lg bg-gray-800 text-gray-300" rows="4" placeholder="Deja tu comentario..."></textarea>
                        <button type="submit" class="mt-2 px-4 py-2 bg-blue-600 hover:bg-blue-700 rounded-lg text-white">Enviar</button>
                    </form>
                    <div class="bg-gray-800 p-4 rounded-lg">
                        <p class="text-gray-400">Sin comentarios aún. ¡Sé el primero en comentar!</p>
                    </div>
                </div>

            </main>

            <aside class="lg:w-1/3 mt-12 lg:mt-0">
                <div class="bg-gray-800 p-6 rounded-lg">
                    <h3 class="text-xl font-bold text-white mb-4">ÚLTIMAS ACTIVIDADES</h3>
                    <ul class="space-y-6">
                        @foreach($recentArticles as $recentArticle)
                            <li class="flex space-x-4">
                               <a href="{{ route('articles.show', $recentArticle->slug) }}" class="flex space-x-4">
                                <img src="{{ asset('storage/' . $recentArticle->image) }}" alt="{{ $recentArticle->title }}" class="w-24 h-24 rounded-md object-cover">
                                    <div>
                                        <h4 class="font-semibold text-white">{{ $recentArticle->title }}</h4>
                                        <p class="text-sm text-gray-400">Leer en {{ rand(5, 15) }} minutes</p>
                                    </div>
                               </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </aside>
        </div>
    </div>
</article>
@endsection
