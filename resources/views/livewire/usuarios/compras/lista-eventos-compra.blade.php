<div class="m-2">
    <!-- Bar chart card -->
    <div class="flex flex-wrap items-center justify-between p-4 border-b dark:border-primary">
        <h4 class="text-lg font-semibold text-black dark:text-light"style="font-family: 'Times New Roman', serif;"><strong>Lista de tus fotos compradas en eventos: </strong> </h4>
        <div class="flex ml-5 mt-3">
            <span
                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                    <path
                        d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                </svg>
            </span>
            <input type="text"
                class="w-full rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600
             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Buscar" wire:model="search">
        </div>
    </div>
    <div class="overflow-x-auto relative  ">


        <?php
        $contador = 0;
        ?>
        @if ($eventos->count())

            <table class="table">
                <thead>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Id</th>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Evento</th>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Direccion</th>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Fecha</th>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Organizador</th>
                    <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Accion</th>
                </thead>
                <tbody>
                    @foreach ($eventos as $evento)
                    <?php 
                    $contador = $contador + 1;
                    ?>
                        <tr>
                            <td data-label="Id">{{$contador}}</td>
                            <td data-label="evento">{{$evento->nombre}}</td>
                            <td data-label="direccion">{{$evento->direccion}}</td>
                            <td data-label="fecha">{{$evento->fecha}}</td>
                            <td data-label="organizador">{{$evento->organizador}}</td>
                            <td data-label="accion">
                                <a href="{{ route('usuarios.lista-fotos-compradas', $evento->idevento) }}"
                                    class="text-white bg-gradient-to-r from-gray-400 via-gray-500 to-gray-600  text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                    >
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        @else
            <div class="px-6 py-4">
                   
            </div>
        @endif


    </div>

    <link rel="stylesheet" href="{{ asset('css/tablaSolicitudes.css') }}" type="text/css">

</div>
