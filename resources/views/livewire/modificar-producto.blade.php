<div>
    <div wire:loading wire.target="searchOption">
        <x-loading/>
    </div>
    @if ($producto == NULL)
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-5" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">No hay productos en la base de datos....</span>
        </div>
    @else
        <section class="container mx-auto font-mono px-10">
            <div class="flex md:order-2">
                <div class="relative md:block w-full mb-4">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" wire:model.live='search'  id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Ingrese el nombre de un producto">
                </div>
            </div>
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr
                                class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300  border-b border-gray-600">
                                <th class="px-4 py-3">Nombre</th>
                                <th class="px-4 py-3">Descripcion</th>
                                <th class="px-4 py-3">Precio</th>
                                <th class="px-4 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($productos as $producto)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                        <div class="flex items-center text-sm">
                                            <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{Storage::url($producto->imagen) ?? ''}}"
                                                    alt="" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                                </div>
                                            </div>
                                            <div>
                                                <p class="font-semibold text-black">{{$producto->nombre}}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border">{{substr($producto->descripcion,0,80)}}...</td>
                                    <td class="px-4 py-3 text-xs border">
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm">
                                            $ {{$producto->precio}} </span>
                                    </td>
                                    <td class="px-4 py-3 text-sm border">
                                        <div class="flex">
                                                <a href="{{ route('admin-modificarProducto', $producto['id']) }}">
                                                    <svg class="h-8 w-8 text-green-500"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                    </svg>

                                                </a>
                                                <a class="mx-4"  wire:click="eliminar({{$producto}})">
                                                    <svg class="h-8 w-8 text-red-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="3 6 5 6 21 6" />  <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />  <line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                    </tbody>
     @endif
                </table>
            </div>
            <div class="pt-8">
                {{$productos->links(data: ['scrollTo' => false])}}
            </div>
    </section>
</div>
