<div class="overflow-x-auto relative sm:rounded-lg">
    <div class="flex ml-5">
        <span
            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                <path
                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
            </svg>
        </span>
        <input type="text"
            class="w-3/6 rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600
         dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Buscar" wire:model="search">
    </div>


    @if ($fotografos->count())
        @foreach ($fotografos as $fotografo)
            <div class="container mx-auto p-5 rounded rounded-lg">
                <div class="border  shadow-lg" style='background-color:rgb(248, 250, 255)'>

                    <div class=" flex flex-wrap blue-box relative p-4">

                        <div class="container mx-auto">
                            <div class="flex flex-col w-full" style="cursor: auto;">

                                <div class="grid gap-4 grid-cols-1  my-2 w-full">

                                    <div class="flex flex-wrap bg-white dark:bg-gray-300 border border-gray-200 dark:border-gray-800  p-2 max-w-72 w-full"
                                        style="cursor: auto;">

                                        <div class="grid gap-4 grid-cols-1 sm:grid-cols-4 my-2">
                                            <strong class="text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Nombre:</strong>
                                            <p class="text-start ">{{ $fotografo->name }}</p>
                                            <strong class="text-black dark:text-light"style="font-family: 'Times New Roman', serif" >Correo:</strong>
                                            <p class="text-start">{{ $fotografo->email }}</p>
                                        </div>

                                        <div class="flex flex-wrap w-full">
                                            <strong class="text-black dark:text-light"style="font-family: 'Times New Roman', serif;">Direccion: </strong>
                                            <p class="ml-14"> {{ $fotografo->direccion }}</p>
                                        </div>

                                        <div class="grid gap-4 grid-cols-1 sm:grid-cols-4 my-2">
                                            <strong class="text-black dark:text-light"style="font-family: 'Times New Roman', serif;">Carnet:</strong>
                                            <p class="text-start">{{ $fotografo->dni }}</p>
                                            <strong class="text-black dark:text-light"style="font-family: 'Times New Roman', serif;">Fecha de
                                                Nacimiento:</strong>
                                            <p class="text-start">{{ $fotografo->fnacimiento }}</p>
                                        </div>

                                    </div>

                                </div>

                                <?php
                                $paquetes = DB::table('paquete_fotos')
                                    ->where('idfotografo', $fotografo->idfotografo)
                                    ->get();
                                ?>

                                <div class="grid gap-4 grid-cols-1 sm:grid-cols-3 my-2 w-full">
                                    @foreach ($paquetes as $paquete)
                                        <div class="metric-card bg-white dark:bg-gray-300 border border-gray-200 dark:border-gray-800  p-4 w-full"
                                            style="cursor: auto;">

                                            <div class="relative group">

                                                <div class="flex mt-1">
                                                    <div class="flex w-full">
                                                        @if ($paquete->posicion == 1)
                                                            <h3
                                                                class="font-bold text-2xl text-black text-center uppercase w-1/2" style="font-family: 'Times New Roman', serif;">
                                                                {{ $paquete->nombre }}
                                                            </h3>
                                                        @endif

                                                        @if ($paquete->posicion == 2)
                                                            <h3
                                                                class="font-bold text-2xl text-black text-center uppercase w-1/2"style="font-family: 'Times New Roman', serif;">
                                                                {{ $paquete->nombre }}
                                                            </h3>
                                                        @endif

                                                        @if ($paquete->posicion == 3)
                                                            <h3
                                                                class="font-bold text-2xl text-black text-center uppercase w-1/2"style="font-family: 'Times New Roman', serif;">
                                                                {{ $paquete->nombre }}
                                                            </h3>
                                                        @endif
                                                        <span
                                                            class="text-3xl text-yellow-500 font-bold text-end">{{ $paquete->precio }}</span>
                                                        <div class="pb-2">
                                                            <span
                                                                class="block text-sm text-black font-bold">$us</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="grid justify-center overflow-x-auto py-3 px-5">
                                                    <div class="flex items-end">
                                                        <ul role="list" class="space-y-4 m-auto text-black">
                                                            <li class="space-x-2">
                                                                
                                                                <span>{{ $paquete->descripcion }}</span>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="grid justify-center overflow-x-auto inset-x-0 bottom-7">

                                                    <button
                                                        wire:click="abrirModal('{{ $fotografo->idfotografo }}', '{{ $paquete->id }}')"
                                                        class="mt-2 inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-red-700  hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                                                        Adquirir Servicio 

                                                    </button>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="ml-10 mt-8 text-red-800">
            <strong class="text-primary-dark dark:text-light"> No hay Registros</strong>
        </div>
    @endif

    <x-jet-dialog-modal wire:model="open">

        <x-slot name="title">
            <h1>Solicitud de contratacion para el evento: <strong class="uppercase"> {{ $evento->nombre }}</strong>
            </h1>
        </x-slot>

        <x-slot name="content">

            <div
                class="block text-center p-6 w-full bg-white  border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-300 dark:border-gray-700 ">
                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-black"style="font-family: 'Times New Roman', serif;">Enviara peticion de
                    trabajo a: <strong class="text-black uppercase"style="font-family: 'Times New Roman', serif;">{{ $fotografo_name }}</strong>
                    por el paquete selecionado: <strong class="text-black uppercase"style="font-family: 'Times New Roman', serif;">{{ $paquete_name }}</strong></h5>
                <p class="font-normal text-black dark:text-text-black mt-5"style="font-family: 'Times New Roman', serif;">Cuando el fotografo acepte
                    <Strong class="text-black uppercase"style="font-family: 'Times New Roman', serif;"> sera contratado con el pago establecido</Strong> .
                </p>

                
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)" class="mr-2" style="font-family: 'Times New Roman', serif;">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="EnviarNotificacion" style="font-family: 'Times New Roman', serif;">
                Enviar Solicitud
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>


</div>
