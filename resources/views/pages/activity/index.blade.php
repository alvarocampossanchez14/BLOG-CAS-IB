@extends('layouts.app')

@section('content')
<main class="min-h-screen text-text bg-background/10">
    <div class="bg-surface/40 border-b border-gray-700">
        <div class="max-w-7xl mx-auto px-4 py-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight">
                Explora todas las Actividades
            </h1>
            <p class="mt-4 text-xl text-textSecondary max-w-2xl">
                Descubre las actividades de Creatividad, Actividad y Servicio (CAS).
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 py-12">
        {{-- Success Message --}}
        @if (session('success'))
        <div class="mb-4 bg-secondary bg-opacity-30 border border-secondary text-white px-4 py-3 rounded-lg relative">
            {{ session('success') }}
        </div>
        @endif

        @if ($activities->isEmpty())
        <div class="bg-surface p-6 rounded-lg shadow-md border border-gray-700 text-center">
            <p class="text-textSecondary">No hay actividades registradas aún.</p>
        </div>
        @else
        <div class="mt-8 grid gap-8 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($activities as $activity)
            <x-activity-card :activity="$activity" />
            @endforeach
        </div>
        @endif
    </div>
</main>
@endsection