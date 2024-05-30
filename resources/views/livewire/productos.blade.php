<div>
    <div wire:loading wire.target="seachOption">
        <x-loading/>
    </div>
    <nav class="pb-10">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto">
            <div class="flex md:order-2">
                <div class="relative md:block">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <input type="text" id="search-navbar" wire:model.live='search' class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Buscar...">
                </div>
            </div>
            <label for="precioDesde"></label>
            <input type="number" wire:model.live="precioDesde" class="form-control" id="precioDesde" placeholder="Precio desde...">
            <label for="precioHasta"></label>
            <input type="number" wire:model.live="precioHasta" class="form-control" id="precioHasta" placeholder="Precio hasta...">
            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="navbar-search">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg
                bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <select wire:model.live="searchCategory"
                        class="appearance-none bg-white block px-6 py-2 text-gray-700 border border-gray-300 rounded leading-tight focus:outline-none
                        focus:ring-2 focus:ring-indigo-600">
                            <option disabled='false'>Categoria...</option>
                            <option value='todos' selected="true">Todos</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{$categoria->nombre}}">{{$categoria->nombre}}</option>
                            @endforeach
                        </select>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="grid md:grid-cols-3 gap-5 sm:grid-cols-2">
        @if ($producto == NULL)
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">No hay productos en la base de datos....</span>
            </div>
        @else
                @foreach ($productos as $producto)
                <div>
                    <div class="max-w-md mx-auto rounded-md overflow-hidden shadow-md hover:shadow-lg bg-white">
                        <div class="relative">
                            <img class="object-contain h-48 w-96" src="{{Storage::url($producto->imagen) ?? ''}}" alt="Product Image">
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-medium mb-2">{{$producto->nombre}}</h3>
                            <p class="text-gray-600 text-sm mb-2">
                                {{$producto->descripcion}}
                            </p>
                            <span class="font-bold text-sm">{{$producto->categoria}}</span>
                            <div class="flex items-center justify-between mt-4">
                                <span class="font-bold text-lg">${{$producto->precio}}</span>
                                <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded" wire:click="agregarCarrito({{$producto}})">
                                    Agregar al carrito
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pt-8">
                {{$productos->links(data: ['scrollTo' => false])}}
            </div>
        @endif
    </div>
