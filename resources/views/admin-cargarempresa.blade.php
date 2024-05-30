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
                <h1 class="mb-4  text-center text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-sky-400">Cargar Empresa</h1>
                <div class="border-b-4 mb-5">
                </div>
            </section>
        </div>

        <div class="flex items-center justify-center pb-10">
            <form action="{{route('admin-cargarempresa')}}" method="POST" class="w-full max-w-lg bg-white px-10 py-10 rounded-lg shadow-lg">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name" >
                            Nombre de la empresa
                        </label>
                        <input name="nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-first-name" type="text" placeholder="" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            CUIT
                        </label>
                        <input name="cuit" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" inputmode="numeric" pattern="\d*" maxlength="11"  placeholder="" required>
                    </div>
                    <div class="w-full md:w-1/2 px-3 pt-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Telefono
                        </label>
                        <input name="telefono" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" maxlength="7" placeholder="" required>
                    </div><div class="w-full md:w-1/2 px-3 pt-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                            Celular
                        </label>
                        <input name="celular" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" maxlength="10" placeholder="" required>
                    </div>
                </div>
                <div class="flex flex-wrap -mx-3 mb-3">
                    <div class="w-full px-3">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Email
                        </label>
                        <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="email" required>
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                            Dirección
                        </label>
                        <input name="direccion" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" required>
                    </div>
                </div>
                <div>
                    <button type="submit" class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-md text-sm px-5 py-2.5">
                        Crear Empresa
                    </button>
                </div>
            </form>
        </div>
</x-app-layout>
