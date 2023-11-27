<div>
    <div class="flex ml-5">
        <span
            class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200  border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30" width="30px" height="30px">
                <path
                    d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z" />
            </svg>
        </span>
        <input type="text"
            class="w-3/6   bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600
         dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Buscar" wire:model="search">
    </div>

    <div class="row">

        @if ($eventos->count())
            @foreach ($eventos as $evento)
                <a href="{{ route('Fotografo.vista-fotos', $evento->id) }}" >
                    <div class="container">
                        <div class="flex flex-wrap">

                            <!-- Column -->
                            <div class="card transition-colors transition duration-500 hover:scale-105">

                                <!-- Article -->
                                <article class="overflow-hidden  shadow-lg">

                                    <?php
                                    $catalogo = DB::table('catalogos')
                                        ->where('id', $evento->idcatalogo)
                                        ->first();
                                    $imagenes = DB::table('fotografias')
                                        ->where('idcatalogo', $catalogo->id)
                                        ->get();
                                        $imag = DB::table('fotografias')
                                        ->where('idcatalogo', $catalogo->id)
                                        ->first();
                                    ?>
                                    @if (count($imagenes) > 0)
                                        <img alt="Placeholder" class="block h-auto w-full"
                                            src="{{$imag->ruta}}">
                                    @else
                                        <img alt="Placeholder" class="block h-auto w-full"
                                            src="https://www.cuestalibros.com/content/images/thumbs/default-image_550.png">
                                    @endif



                                    <header
                                        class="flex flex-wrap items-center justify-between leading-tight p-2 md:p-4">
                                        <h1 class="text-lg">
                                            <p class="no-underline hover:underline text-black uppercase font-bold">
                                                {{ $evento->nombre }}
                                            </p>
                                            <p class="mt-2 text-sm">
                                                <i class="fa-solid fa-location-dot"></i> {{ $evento->direccion }}
                                            </p>
                                        </h1>
                                        <p class=" mt-2 text-grey-darker text-sm">
                                            <i class="fa-solid fa-calendar-days"></i> {{ $evento->fecha }} <i
                                                class="fa-solid fa-clock"></i> {{ $evento->hora }} Hrs
                                        </p>

                                    </header>

                                    <footer class="flex items-center justify-between leading-none p-2 md:p-4">

                                    </footer>

                                </article>
                                <!-- END Article -->

                            </div>
                            <!-- END Column -->
                        </div>
                    </div>

                </a>
            @endforeach
        @else
            <div class="px-6 py-4">
                <strong class="text-gray-600 "style="font-family: 'Times New Roman', serif;">No exsiste ningun registro coincidente</strong>
            </div>
        @endif
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/misEventosOrga.css') }}" type="text/css">
