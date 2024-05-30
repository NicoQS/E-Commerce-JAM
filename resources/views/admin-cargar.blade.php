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
            <h1 class="mb-4  text-center text-3xl font-extrabold text-gray-900 md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-gray-600 from-sky-400">Cargar Productos</h1>
            <div class="border-b-4 mb-5">
            </div>
        </section>
    </div>
    <div class="flex items-center justify-center pb-10">
        <div class="mx-auto w-full max-w-[550px] bg-white rounded-lg pb-5 shadow-lg">
            <form class="py-4 px-9" action="{{route('admin-cargar')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Seleccionar la empresa para realizar la carga de los datos:
                    </label>
                    <select required name="proveedor" id="empresa" class="w-full border border-[#e0e0e0] rounded-md px-4 py-3 text-base font-medium text-[#6B7280]">
                        @foreach ($proveedores as $proveedor)
                            <option value="{{$proveedor->id}}" name='proveedor'>{{$proveedor->nombre}}</option>
                        @endforeach
                        <option disabled="true" selected="true" value="">Seleccionar Empresa</option>
                    </select>

                </div>

                <div class="mb-6 pt-4">
                    <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                        Subir Archivo
                    </label>

                    <div class="mb-8">
                        <input type="file" name="import_file" id="file" class="sr-only" required/>
                        <label for="file"
                            class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                            <div>
                                <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                    Suelta archivos aquí
                                </span>
                                <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                    o
                                </span>
                                <span
                                    class="inline-flex rounded border border-gray-500  py-2 px-7 text-base font-medium text-[#07074D]">
                                    Buscalos en tu computadora
                                </span>
                            </div>
                        </label>
                        <div class="flex items-center">
                            <div id='display_file'></div>
                            <div onclick="deleteFile()" id="buttonDelete" hidden>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 cursor-pointer mx-2"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor" onclick="deleteFile()">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <button type="submit" wire:mode.live="uploadFile" data-confirm-delete="true"
                        class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                        Cargar Archivo de Productos
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    const file = document.getElementById('file');
    const display_file = document.getElementById('display_file');
    const buttonDelete = document.getElementById('buttonDelete');

    file.addEventListener('change', function(){
        display_file.innerHTML = file.files[0].name;
        //Show delete button when file is uploaded
        buttonDelete.style.display = 'block';
    });

    //Delete uploaded file and hide delete button
    function deleteFile(){
        display_file.innerHTML = '';
        file.value = '';
        buttonDelete.style.display = 'none';
    }
</script>
