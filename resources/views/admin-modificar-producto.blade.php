<x-app-layout>
    @php
        $identificador = rand();
    @endphp
    <div class="flex items-center justify-center text-gray-800 p-10">
        <section class="container mx-auto p-6 font-mono">
            <h1 class="mb-4  text-center text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-sky-400">Modificacion de producto</h1>
            <div class="border-b-4 mb-5">
            </div>
        </section>
    </div>
    <div>
        <div class="my-4">
            <p>{{$producto->imagen}}</p>
            @if ($producto->imagen)
                @if (in_array($producto->imagen->extension(),['jpg','jpeg','png','gif']))
                    <img src="{{$producto->imagen->temporaryUrl()}}" alt="imagen temporal" class="mb-4">
                @else
                    <div class="mb-4">
                        <span class="text-red-500">La imagen debe ser jpg, jpeg, png o gif</span>
                    </div>
                @endif
            @else
            <img src="{{Storage::url($producto['imagen'] ?? '')}}" alt="No image...">
            @endif
        </div>
        <div class="mb-4">
            <x-label value="Nombre del Producto" />
            <input type="text" value='{{$producto->nombre}}'>
            <x-input value={{$producto->nombre}} type="text" class="w-full"/>
            <x-input-error for="producto.title"/>
        </div>
        <div class="mb-4">
            <x-label value="Precio del Producto"/>
            <x-input wire:model.live="producto.precio" type="text" class="w-full"/>
            <x-input-error for="producto.precio"/>
        </div>
        <div class="mb-4">
            <x-label value="Stock"/>
            <x-input wire:model.live="producto.stock" type="text" class="w-full"/>
            <x-input-error for="producto.stock"/>
        </div>
        <div class="mb-4">
            <x-label value="Descripcion del Producto"/>
            <textarea wire:model.live="producto.descripcion" class="w-full border-gray-300 dark:border-gray-700   focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" cols="30" rows="10"></textarea>
            <x-input-error for="producto.descripcion"/>
        </div>

        <div class="mb-4">
            <input wire:model.live="image" type="file" id={{$identificador}}>
            <x-input-error for="image"/>
        </div>
    </div>
</x-app-layout>
