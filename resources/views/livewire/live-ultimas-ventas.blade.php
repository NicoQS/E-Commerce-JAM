<div>
    @if (!$pedidos->isEmpty())
        <div class="flex items-center justify-center text-gray-800 p-10">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 gap-6 w-full max-w-6xl">
                <!-- Tile 1 -->
                <div class="flex items-center p-4 bg-white rounded">
                    <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <span class="text-xl font-bold">$8,430</span>
                        <div class="flex items-center justify-between">
                        <span class="text-gray-500">Revenue last 30 days</span>
                        <span class="text-green-500 text-sm font-semibold ml-2">+12.6%</span>
                        </div>
                    </div>
                    </div>

                    <!-- Tile 2 -->
                    <div class="flex items-center p-4 bg-white rounded">
                    <div class="flex flex-shrink-0 items-center justify-center bg-red-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-red-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L9 14.586V3a1 1 0 012 0v11.586l4.293-4.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <span class="text-xl font-bold">211</span>
                        <div class="flex items-center justify-between">
                        <span class="text-gray-500">Sales last 30 days</span>
                        <span class="text-red-500 text-sm font-semibold ml-2">-8.1%</span>
                        </div>
                    </div>
                    </div>

                    <!-- Tile 3 -->
                    <div class="flex items-center p-4 bg-white rounded">
                    <div class="flex flex-shrink-0 items-center justify-center bg-green-200 h-16 w-16 rounded">
                        <svg class="w-6 h-6 fill-current text-green-700"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3.293 9.707a1 1 0 010-1.414l6-6a1 1 0 011.414 0l6 6a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L4.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow flex flex-col ml-4">
                        <span class="text-xl font-bold">140</span>
                        <div class="flex items-center justify-between">
                        <span class="text-gray-500">Customers last 30 days</span>
                        <span class="text-green-500 text-sm font-semibold ml-2">+28.4%</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Component End  -->
        </div>
        <section class="container mx-auto p-6 font-mono">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <thead>
                        <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-300 uppercase border-b border-gray-600">
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Status</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($pedidos as $pedido)
                                <tr class="text-gray-700">
                                    <td class="px-4 py-3 border">
                                    <div class="flex items-center text-sm">
                                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full" src="https://images.pexels.com/photos/5212324/pexels-photo-5212324.jpeg?auto=compress&cs=tinysrgb&dpr=3&h=750&w=1260" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div>
                                        <div>
                                        <p class="font-semibold text-black text-lg">{{$pedido->usuario->name}}</p>
                                        </div>
                                    </div>
                                    </td>
                                    <td class="px-4 py-3 text-ms font-semibold border text-lg">${{$pedido->total_pedido}}</td>
                                    <td class="px-4 py-3 text-xs border">
                                        <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm uppercase text-lg"> {{$pedido->estado_pedido->estado}} </span>
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
