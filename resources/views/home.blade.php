@extends('layouts.app')

@section('content')
<section>
    <div class="relative isolate overflow-hidden bg-gradient-to-b from-primary/20 pt-14">
        <div class="absolute inset-y-0 right-1/2 -z-10 -mr-96 w-[200%] origin-top-right skew-x-[-30deg] bg-background shadow-xl shadow-indigo-600/10 ring-1 ring-background sm:-mr-80 lg:-mr-96" aria-hidden="true"></div>
        <div class="mx-auto max-w-7xl px-6 py-32 sm:py-40 lg:px-8">
        <div class="mx-auto max-w-2xl lg:mx-0 lg:grid lg:max-w-none lg:grid-cols-2 lg:gap-x-16 lg:gap-y-8 xl:grid-cols-1 xl:grid-rows-1 xl:gap-x-8">
            <h1 class="max-w-2xl text-balance text-5xl font-semibold italic tracking-tight text-text sm:text-6xl lg:col-span-2 xl:col-auto"> We’re changing the way people connect through CAS</h1>            
            <div class="mt-6 max-w-xl lg:mt-0 xl:col-end-1 xl:row-start-1">
            <p class="text-pretty text-lg font-medium  text-gray-500 sm:text-xl/8">Bienvenido al blog de Álvaro Campos Sánchez, donde comparto mi experiencia en la asignatura de CAS del IB Diploma. Aquí exploro cómo el enfoque en Creatividad, Actividad y Servicio no solo enriquece el aprendizaje académico, sino que también transforma la forma en que conectamos con la comunidad y desarrollamos habilidades clave para el futuro.</p>
            <div class="mt-10 flex items-center gap-x-6">
                <a href="#" class="text-sm font-semibold leading-6 text-text bg-primary p-2 rounded-md hover:scale-105">
                    Ver Proyectos
                    <i class="fa-solid fa-eye ml-2"></i>
                </a>
            </div>
            </div>
            <img src="http://localhost:8000/images/foto_1.jpg" alt="" class="mt-10 aspect-[6/5] w-full max-w-lg rounded-2xl object-cover sm:mt-16 lg:mt-0 lg:max-w-none xl:row-span-2 xl:row-end-2 xl:mt-36">
        </div>
        </div>
        <!-- <div class="absolute inset-x-0 bottom-0 -z-10 h-24 bg-gradient-to-t from-primary/20 sm:h-32"></div> -->
    </div>
</section>


<section class="py-24 sm:py-32 relative">

  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl text-center">
      <h2 class="text-balance text-4xl font-semibold tracking-tight text-text sm:text-5xl">Proyectos por y para la comunidad</h2>
      <p class="mt-2 text-lg leading-8 text-textSecondary">Learn how to grow your business with our expert advice.</p>
    </div>


    <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">

    <article class="relative isolate flex flex-col justify-end overflow-hidden rounded-2xl bg-gray-900 px-8 pb-8 pt-80 sm:pt-48 lg:pt-80 hover:scale-105">
        <img src="https://lh3.googleusercontent.com/pw/AP1GczMLBNuzOQrMTRjhTHcJINQKn5VktBxLP4mLvuYNZN3KMuroWOgArMGghQqlPOaKYrb-eN7bcI8YzU6WrdvY8ChPR04V2sL-Fg5qoJSggtO9QC0mtG2UAv35Uj2zg-77B21MISPpx8pk9UKKb4N-rYtA=w1197-h898-s-no-gm?authuser=0" alt="" class="absolute inset-0 -z-10 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-gradient-to-t from-gray-900 via-gray-900/40"></div>
        <div class="absolute inset-0 -z-10 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>

        <div class="flex flex-wrap items-center gap-y-1 overflow-hidden text-sm leading-6 text-gray-300">
          <time datetime="2020-03-16" class="mr-8 font-semibold">Oct 3, 2024</time>
          <div class="-ml-4 flex items-center gap-x-4">
            <svg viewBox="0 0 2 2" class="-ml-0.5 h-0.5 w-0.5 flex-none fill-white/50">
              <circle cx="1" cy="1" r="1" />
            </svg>
            <div class="flex gap-x-2.5">
              <img  src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" class="h-6 w-6 flex-none rounded-full bg-white/10">
              <span class="font-semibold">Álvaro Campos</span>
            </div>
          </div>
        </div>
        <h3 class="mt-3 leading-6">
          <a href="#" class="flex flex-col">
            <span class="absolute inset-0"></span>
            <span class="text-xl text-text font-semibold">Buceo en l'Atmella de Mar</span>
            <span class="text-md text-text font-semibold mt-5">
                <a class="bg-primary/50 p-2 rounded-md">
                    Más información
                    <i class="fa-solid fa-plus"></i>
                </a>
            </span>
          </a>
        </h3>
      </article>

    </div>
  </div>
</section>






@endsection
