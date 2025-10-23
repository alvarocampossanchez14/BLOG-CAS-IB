@extends('layouts.app')

@section('content')
<section>
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-primary/20 pt-14">
        <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-background shadow-xl shadow-indigo-600/10 ring-1 ring-background sm:-mr-80 lg:-mr-96" aria-hidden="true"></div>
        <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-8 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
                <h1 class="max-w-2xl text-balance text-5xl font-semibold italic tracking-tight text-text sm:text-6xl lg:col-span-2 xl:col-auto"> We’re changing the way people connect through CAS</h1>
                <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
                    <p class="text-pretty text-lg font-medium text-gray-400 sm:text-xl/8">
                        Bienvenido al blog de Álvaro Campos Sánchez, donde comparto mi experiencia en la asignatura de CAS del IB Diploma. Aquí exploro cómo el enfoque en Creatividad, Actividad y Servicio no solo enriquece el aprendizaje académico, sino que también transforma la forma en que conectamos con la comunidad y desarrollamos habilidades clave para el futuro.
                    </p>
                    <div class="mt-10 flex items-center gap-x-6">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center justify-center px-5 py-2.5 rounded-lg shadow-md text-sm font-semibold text-primary transition-colors duration-300
                            bg-gray-800 border border-gray-700 hover:bg-primary hover:scale-105 hover:border-gray-200/50 hover:text-white
                            focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-background">
                            <i class="fas fa-project-diagram mr-2"></i>
                            Ver todos los Proyectos
                        </a>
                    </div>
                </div>
                <img src="{{ asset('/images/futbol.jpg') }}" alt="CAS Blog Image" class="mt-10 aspect-[6/5] w-full max-w-lg rounded-2xl object-cover sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36">
            </div>
        </div>
    </div>
</section>

<section class="py-24 sm:py-32 relative">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl text-center">
            <h2 class="text-balance text-4xl font-semibold tracking-tight text-text sm:text-5xl">Proyectos por y para la comunidad</h2>
            <p class="mt-2 text-lg leading-8 text-textSecondary">Proyectos CAS creados para apoyar a la comunidad y crecer como persona durante el Bachillerato Internacional.</p>
        </div>

        <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach($projects as $project)
            <x-project-card :project="$project" />
            @endforeach
        </div>
    </div>
</section>

@endsection
