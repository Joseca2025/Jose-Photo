<div class="m-2">
    <!-- Bar chart card -->
    <div class="bg-white  dark:bg-darker">
        <!-- Card header -->
        <div class="flex flex-wrap items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-black dark:text-light"style="font-family: 'Times New Roman', serif;">Los catalogos de eventos</h4>
            <div class="flex ml-5">
                <span
                    class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                    <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px"
                        height="30px">
                        <path
                            d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
                    </svg>
                </span>
                <input type="text"
                    class="w-full rounded-none  bg-gray-50 border text-gray-400 focus:ring-blue-500 focus:border-blue-500 block text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600
                 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar" wire:model="search">
            </div>
        </div>

        <div class="p-7">
            <div class="flex w-full flex-wrap content-center justify-center p-5 bg-gray-100">
                <div class="grid lg:grid-cols-3 sm:grid-cols-3 gap-3">
                    @if ($eventos->count())
                        @foreach ($eventos as $evento)
                            <?php
                            if ($evento->idcatalogo != null) {
                                $catalogo = DB::table('catalogos')
                                    ->where('id', $evento->idcatalogo)
                                    ->first();
                                $imagenes = DB::table('fotografias')
                                    ->where('idcatalogo', $catalogo->id)->where('tipo', 'publica')
                                    ->get();
                                $imag = DB::table('fotografias')
                                    ->where('idcatalogo', $catalogo->id)
                                    ->first();
                            } else {
                                $imagenes = [];
                            }
                            ?>

                            @if (count($imagenes) > 0)

                                <div
                                    class="w-80 bg-white p-3 transition-colors transition duration-500 hover:scale-105">
                                    <a href="{{ route('usuarios.catalogo-vista', $evento->id) }}">
                                        <img class="h-52 w-full object-cover " src="{{ $imag->ruta }}" />
                                        <ul class="mt-3 flex flex-wrap">
                                            <li class="mr-auto">
                                                <a href="#" class="flex text-black hover:text-gray-600"style="font-family: 'Times New Roman', serif;">
                                                    <i class="fa-solid  mt-1"></i>
                                                     {{$evento->nombre}}
                                                </a>
                                            </li>
                                        </ul>
                                    </a>

                                </div>
                                @endif
                            @endforeach
                        @else
                            <div class="px-6 py-4">
                                <strong class="text-gray-500 "style="font-family: 'Times New Roman', serif;">No existe ningun registro
                                    coincidente</strong>
                            </div>
                        @endif

                </div>
            </div>

        </div>
    </div>
</div>
