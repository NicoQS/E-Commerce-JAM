<div>
    <div>
        @if(!$pedidos->isEmpty())
                <section class="container mx-auto p-6 font-mono text-center">
                    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full">
                                <thead>
                                    <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-300 uppercase border-b border-gray-600">
                                        <th class="px-4 py-3">Pedidos</th>
                                        <th class="px-4 py-3">Total</th>
                                        <th class="px-4 py-3">Envio</th>
                                        <th class="px-4 py-3">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @foreach ($pedidos as $pedido)
                                        <tr class="text-gray-700">
                                            <!-- Tabla -->
                                            <td class="border">
                                                <section class="container mx-auto p-4 font-mono">
                                                    <div class="w-full overflow-hidden rounded-lg">
                                                        <div class="w-full overflow-x-auto">
                                                            <table class="w-full">
                                                                <thead>
                                                                    <tr class="text-md font-semibold tracking-wide text-center text-gray-900 bg-gray-200 uppercase border-b border-gray-700">
                                                                        <th class="px-4 py-3">Nombre</th>
                                                                        <th class="px-4 py-3">Precio</th>
                                                                        <th class="px-4 py-3">Cantidad</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="bg-white">
                                                                    @foreach ($pedido->items_pedido as $item)
                                                                        @php
                                                                            $producto = $item->producto;
                                                                        @endphp
                                                                        <tr class="text-gray-700">
                                                                            <td class="px-4 py-3 border">
                                                                                <div class="flex items-center text-sm">
                                                                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                                                                        <img class="object-cover w-full h-full rounded-full"
                                                                                        src="{{Storage::url($producto->imagen) ?? ''}}"
                                                                                        alt="" loading="lazy" />
                                                                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                                                                    </div>
                                                                                    <div>
                                                                                        <p class="text-md font-semibold text-black">{{$producto->nombre}}</p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td class="px-4 py-3 text-md border">
                                                                                <p class="font-semibold text-black">${{$producto->precio}}</p>
                                                                            </td>
                                                                            <td class="px-4 py-3 text-md border">
                                                                                <p class="font-semibold text-black">{{$item->cantidad}}</p>
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </section>
                                            </td>
                                            <td class="px-4 py-3 text-xl font-semibold border">${{$pedido->total_pedido}}</td>
                                            <td class="px-1 py-3 text-xl border">
                                                <span class="px-2 py-1 text-xl font-semibold leading-tight text-black-700 bg-yellow-100 rounded-sm uppercase">{{$pedido->estado_pedido->estado}}</span>
                                            </td>
                                            <td class="px-3 py-3 text-sm border">
                                                <button type="button" wire:click="cancelarPedido({{$pedido->id}})"
                                                class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-xl px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                                CANCELAR</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
        @endif
    </div>
</div>
