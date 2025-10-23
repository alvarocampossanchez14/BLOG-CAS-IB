<header class="bg-primary/10 shadow-2xl shadow-black">
    <nav class="mx-auto flex max-w-7xl items-center justify-center gap-x-8 lg:justify-between  p-6 py-4 lg:px-8" aria-label="Global">
        <div class="flex items-center gap-x-12">
            <a href="{{route('home')}}" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="lg:h-16 h-10 w-auto" src="/dp_programa.png" alt="">
            </a>
            <div class="hidden lg:flex lg:gap-x-12">
                <a href="{{ route('about') }}" class="text-sm font-semibold leading-6 text-text">Sobre mí</a>
                <a href="{{ route('ib-cas') }}" class="text-sm font-semibold leading-6 text-text">¿Qué es IB?</a>
                <a href="{{ route('projects.index') }}" class="text-sm font-semibold leading-6 text-text">Proyectos</a>
                <a href="{{ route('activities.index') }}" class="text-sm font-semibold leading-6 text-text">Actividades</a>
            </div>
        </div>

        <div class="flex lg:hidden">
            <button id="navbar-open" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-text">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
    </nav>

    <div id="navbar-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
        <div class="fixed inset-0 z-10"></div>
        <div class="fixed inset-y-0 right-0 z-10 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <img class="h-8 w-auto" src="https://stgeorgemadrid.com/wp-content/uploads/2022/02/dp-programme-logo-es-1.png" alt="">
                </a>
                <button id="navbar-close" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root ">
                <div class="-my-6 divide-y divide-gray-500/10">
                <div class="space-y-2 py-6">
                    <a href="#" class="-mx-3 block text-sm font-semibold leading-6 text-gray-700">¿Qué es IB?</a>
                    <a href="{{ route('projects.index') }}" class="-mx-3 block text-sm font-semibold leading-6 text-gray-700">Proyectos</a>
                    <a href="#" class="-mx-3 block text-sm font-semibold leading-6 text-gray-700">Actividades</a>
                    <a href="#" class="-mx-3 block text-sm font-semibold leading-6 text-gray-700">Contacto</a>
                </div>
                </div>
            </div>
        </div>
  </div>
</header>

