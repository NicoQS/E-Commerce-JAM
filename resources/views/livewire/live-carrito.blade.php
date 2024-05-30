<div>
    <section class="h-screen bg-gray-100 px-4 text-gray-600 antialiased" x-data="app">

        <div class="flex flex-col justify-center">
            <!-- Table -->
            <div class="mx-auto w-full max-w-2xl rounded-lg border border-gray-200 bg-white shadow-lg">
                <header class="border-b border-gray-100 px-5 py-4">
                    <div class="font-semibold text-gray-800">Administrar Carrito</div>
                </header>

                <div class="overflow-x-auto p-3">
                    <table class="w-full table-auto">
                        <thead class="bg-gray-50 text-xs font-semibold uppercase text-gray-400">
                            <tr>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Nombre</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Precio</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Cantidad</div>
                                </th>
                                <th class="p-2">
                                    <div class="text-center font-semibold">Action</div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="text-sm">
                            @if (!$item_carrito->isEmpty())

                                @foreach ($item_carrito as $item)
                                    <tr>
                                        <td class="p-2">
                                            <div class="text-center font-medium text-gray-800">{{$item->nombre}}</div>
                                        </td>
                                        <td class="p-2.5">
                                            <div class="text-center font-medium text-green-500">${{$item->precio}}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="text-center font-medium text-green-500">{{$item->cantidad}}</div>
                                        </td>
                                        <td class="p-2">
                                            <div class="flex justify-center">
                                                <button wire:click="eliminarItem({{$item->id}})">
                                                    <svg class="h-8 w-8 rounded-full p-1 hover:bg-gray-100 hover:text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $total += $item->precio * $item->cantidad;
                                    @endphp
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- total amount -->
                <div class="flex flex-row-reverse justify-end space-x-4 border-t border-gray-100 px-5 py-4 text-2xl font-bold">
                    <div class="flex">
                    @if (!$item_carrito->isEmpty())
                        <button class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2" wire:click="modal(true)">
                            Pagar
                        </button>
                    @endif
                    </div>
                    <div class="flex grow text-blue-600 pt-1"><span class="text-black pr-2">Total:</span>$ {{$total}}</div>
                </div>

            </div>
        </div>

    </section>

    <x-dialog-modal wire:model='open'>
        <x-slot name='title'>
            <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Ventana de Facturación</h1>
        </x-slot>
        <x-slot name='content'>

            <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
                <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">
                    <div class="w-full flex justify-start text-gray-600 mb-3">
                        <svg  xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-wallet" width="52" height="52" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M17 8v-3a1 1 0 0 0 -1 -1h-10a2 2 0 0 0 0 4h12a1 1 0 0 1 1 1v3m0 4v3a1 1 0 0 1 -1 1h-12a2 2 0 0 1 -2 -2v-12" />
                            <path d="M20 12v4h-4a2 2 0 0 1 0 -4h4" />
                        </svg>
                    </div>
                    <h1 class="text-gray-800 font-lg font-bold tracking-normal leading-tight mb-4">Ingrese Detalles de Facturación</h1>
                    <label for="name" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Nombre</label>
                    <input id="name" class="mb-5 mt-2 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="James" />
                    <label for="email2" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Número de Tarjeta</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute text-gray-600 flex items-center px-4 border-r h-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="3" y="5" width="18" height="14" rx="3" />
                                <line x1="3" y1="10" x2="21" y2="10" />
                                <line x1="7" y1="15" x2="7.01" y2="15" />
                                <line x1="11" y1="15" x2="13" y2="15" />
                            </svg>
                        </div>
                        <input id="email2" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-16 text-sm border-gray-300 rounded border" placeholder="XXXX - XXXX - XXXX - XXXX" />
                    </div>
                    <label for="expiry" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">Fecha de Expiración</label>
                    <div class="relative mb-5 mt-2">
                        <div class="absolute right-0 text-gray-600 flex items-center pr-3 h-full cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <rect x="4" y="5" width="16" height="16" rx="2" />
                                <line x1="16" y1="3" x2="16" y2="7" />
                                <line x1="8" y1="3" x2="8" y2="7" />
                                <line x1="4" y1="11" x2="20" y2="11" />
                                <rect x="8" y="15" width="2" height="2" />
                            </svg>
                        </div>
                        <input id="expiry" class="text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
                    </div>
                    <label for="cvc" class="text-gray-800 text-sm font-bold leading-tight tracking-normal">CVC</label>
                    <div class="relative mb-5 mt-2">
                        <input id="cvc" class="mb-8 text-gray-600 focus:outline-none focus:border focus:border-indigo-700 font-normal w-full h-10 flex items-center pl-3 text-sm border-gray-300 rounded border" placeholder="MM/YY" />
                    </div>
                    <div class="flex items-center justify-start w-full">
                        @if (!$item_carrito->isEmpty())
                            @if ($item->cantidad != 0)
                                <button class="focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm" wire:click="crearPedido()">Pagar</button>
                            @endif
                        @endif
                        <button class="focus:outline-none focus:ring-2 focus:ring-offset-2  focus:ring-gray-400 ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm" wire:click="modal(false)">Cancelar</button>
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name='footer'>
        </x-slot>
    </x-dialog-modal>

</div>
