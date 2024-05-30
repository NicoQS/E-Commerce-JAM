<x-app-layout>
    <div>
        <x-slot name="header">
            <x-nav-link href="{{ route('admin-modificar') }}" :active="request()->routeIs('admin-modificar')">
                {{ __('Modificar productos') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin-cargar') }}" :active="request()->routeIs('admin-cargar')">
                {{ __('Cargar Productos') }}
            </x-nav-link>
            <x-nav-link href="{{ route('admin-cargarempresa') }}" :active="request()->routeIs('admin-cargarempresa')">
                {{ __('Cargar Empresa') }}
            </x-nav-link>
        </x-slot>
    </div>
    <div class="flex items-center justify-center text-gray-800 p-10">
        <section class="container mx-auto p-6 font-mono">
            <h1 class="mb-4  text-center text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-sky-400">Modificar Productos</h1>
            <div class="border-b-4 mb-5">
            </div>
        </section>
    </div>
    @livewire('modificar-producto');
</x-app-layout>
