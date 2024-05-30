<div>
    @if ($productos->count() != 0)
        <h3 class="text-gray-600 text-2xl font-medium text-center">Populares</h3>
        <div class="relative grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6" wire:poll.2000ms>
            @foreach ($productos as $producto)
                <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                    <div class="flex items-end justify-end h-60 object-contain w-full bg-cover" style="background-image: url('{{Storage::url($producto->imagen) ?? ''}}')">
                    </div>
                    <div class="px-5 py-3">
                        <h3 class="text-gray-700 uppercase">{{$producto->nombre}}</h3>
                        <span class="text-gray-500 mt-2">${{$producto->precio}}</span>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
