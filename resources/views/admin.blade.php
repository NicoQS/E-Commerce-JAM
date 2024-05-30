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

        @livewire('live-ultimas-ventas')

    </div>
</x-app-layout>
