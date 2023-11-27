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
            class="w-3/6   bg-gray-50 border text-gray-900  border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600
         dark:placeholder-gray-400 dark:text-white"
            placeholder="Buscar" wire:model="search">
        @livewire('organizador.mis-eventos.create-eventos')
    </div>

    <div class="row">

        @if ($eventos->count())
            @foreach ($eventos as $evento)
                <?php
                $color = 'bg-gradient-to-r from-green-300 to-blue-300';
                if ($evento->idfotografo == null) {
                    $color = 'bg-gradient-to-r from-indigo-300 via-purple-300 to-pink-300';
                }
                
                ?>
                <a href="#">
                    <div class="container">
                        <div class="flex flex-wrap">

                            <!-- Column -->
                            <div class="card transition  hover:scale-105">

                                <!-- Article -->
                                <article class="overflow-hidden  shadow-lg">

                                    <?php
                                    if ($evento->idcatalogo != null) {
                                        $catalogo = DB::table('catalogos')
                                            ->where('id', $evento->idcatalogo)
                                            ->first();
                                        $imagenes = DB::table('fotografias')
                                            ->where('idcatalogo', $catalogo->id)
                                            ->get();
                                        $imag = DB::table('fotografias')
                                            ->where('idcatalogo', $catalogo->id)
                                            ->first();
                                    } else {
                                        $imagenes = [];
                                    }
                                    ?>
                                    @if (count($imagenes) > 0)
                                        <img alt="Placeholder" class="block h-full w-full"
                                            src="{{$imag->ruta}}">
                                    @else
                                        <img alt="Placeholder" class="block h-auto w-full"
                                            src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcQyqO3OUwOUq9j45f6pzW0uz-5kkrcfEg3aKwnrI6WXSAW-DFty">
                                    @endif

                                    <header
                                        class="flex flex-wrap items-center justify-between leading-tight p-2 md:p-4">
                                        <h1 class="text-lg">
                                            <p class="no-underline hover:underline text-black uppercase font-serif font-bold">
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
                                        <p class="no-underline hover:underline text-black uppercase font-bold">
                                            @if ($evento->idfotografo == null)
                                                <div class="flex items-center">
                                                    <div class="h-4 w-4 rounded-full bg-red-600 mr-2 flex items-center justify-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                                        </svg>
                                                    </div>
                                                    <span>Sin Fotógrafo</span>
                                                    
                                                </div>
                                            @endif
                                            @if ($evento->idfotografo != null)
                                                <div class="flex items-center">
                                                    <div class="h-4 w-4 rounded-full bg-green-500 mr-2"></div>
                                                    Con Fotografo
                                                </div>
                                            @endif
                                        </p>


                                        <a href="{{ route('organizador.misEventos.listaSolicitudes', $evento->id) }}"
                                            class="block ml-2 px-5 py-2 border border-gray-500  text-white 
                                            bg-gray-500 transition-colors transition duration-500 
                                            hover:scale-105">Solicitudes </a>
                                        
                                        

                                        @if ($evento->idfotografo == null)
                                        <a href="{{ route('organizador.misEventos.tablafotografos', $evento->id) }}"
                                            class="block ml-2 px-5 py-2 border border-gray-500  dark:text-light hover:bg-primary-100 dark:hover:bg-primary transition-colors transition duration-500 hover:scale-105">Contratar</a>
                                        @endif
                                        @if ($evento->idfotografo != null)
                                        <a href="{{ route('organizador.misEventos.catalogo', $evento->id) }}"
                                            class="block ml-2 px-5 py-2 border border-gray-500  bg-gray-500 text-white transition-colors transition duration-500 hover:scale-105">Catalogo</a>
                                        @endif

                                      
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
                <strong class="text-red-800 animate-pulse">No exsiste ningun registro coincidente</strong>
            </div>
        @endif
    </div>
</div>

<link rel="stylesheet" href="{{ asset('css/misEventosOrga.css') }}" type="text/css">




<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('606975d0ee229a82f40f', {
        cluster: 'sa1'
    });

    var channel = pusher.subscribe('actualizar-channel');
    channel.bind('actualizar-event', function(data) {
        //alert(JSON.stringify(data));
        Livewire.emit('actualizarEventos', data);
    });
</script>
