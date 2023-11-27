<div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3 ">

    <!-- QR chart card -->
    <div class="bg-gray-200  dark:bg-darker">
        <!-- Card header -->
        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">QR del evento de {{ $evento->nombre }}</h4>
            <div class="flex items-center">
            </div>
        </div>
        <!-- Chart -->
        <div class="relative p-4 h-72 content-center">
            <?php
            $qr = DB::table('qrs')
                ->where('id', $evento->idqr)
                ->first();
            ?>
            <img class="p-10 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2" src="{{ $qr->imagen }}"
                alt="" id="imaqr">

        </div>
        <div class="text-center">
            <a id="descargarQR" class="mb-2 text-white bg-black hover:bg-gray-900 focus:outline-none focus:ring-lime-300 dark:focus:ring-lime-800 font-medium text-white px-5 text-center p-1 btn">Descargar</a>
        </div>
    </div>

    <?php
        $fotografo = DB::table('fotografos')
            ->where('id', $evento->idfotografo)
            ->first();
        $userfoto = DB::table('users')
            ->where('id', $fotografo->iduser)
            ->first();
    ?>


        <!-- Bar chart card -->
        <div class="col-span-2 bg-gray-200  dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Informacion del Evento</h4>
            </div>
            <!-- Chart -->
            <div class="relative p-4 h-72 overflow-y-auto">
                <div class="grid sm:grid-cols-1 lg:grid-cols-1">
                    <div class="lg:mr-2">
                        <div class="grid grid-rows-5 gap-2 col-span-1">
                            <div class="text-start p-2 row-span-2" style="font-family: 'Times New Roman', serif;">
                                <strong>Direccion: </strong>{{$evento->direccion}}
                            </div>
                            <div class="text-start p-2 rounded-lg " style="font-family: 'Times New Roman', serif;">
                                <strong>Fecha: </strong>{{$evento->fecha}}
                            </div>
                            <div class="text-start p-2 rounded-lg " style="font-family: 'Times New Roman', serif;">
                                <strong>Hora: </strong>{{$evento->hora}}
                            </div>
                            <div class="text-start p-2" style="font-family: 'Times New Roman', serif;">
                                <strong>Fotografo: </strong>{{$userfoto->name}}
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    
</div>

<div class="p-4">
    <!-- Bar chart card -->
    <div class="bg-gray-200  dark:bg-darker">
        <!-- Card header -->
        <div class="flex items-center justify-between p-4 ">
            <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Catalogo de Imagenes</h4>
        </div>
        <!-- Chart -->

        <!-- Chart -->
        <form action="{{ route('organizador.descargar-fotos', $idevento) }}" method="GET">
            @csrf
            <div class="container">
                @if ($imagenes->count())
                    @foreach ($imagenes as $imagen)
                        <label class="card">
                            <input type="checkbox" id="marcadas" name="marcadas[]" value="{{ $imagen->id }}">
                            <div class="card-content">
                                <img src="{{ $imagen->ruta }}" alt="" />
                                <div class="content">
                                    <h4><strong>Precio:</strong></h4>
                                    <p>{{ $imagen->precio }}</p>
                                </div>
                            </div>
                        </label>
                    @endforeach
                @else
                    <div class="px-6 py-4">
                        <strong class="text-gray-500 "style="font-family: 'Times New Roman', serif;">No existe ningun registro coincidente</strong>
                    </div>

                @endif


            </div>
            <hr class="m-5 bg-black">
            <p class="px-5" style="font-family: 'Times New Roman', serif;">Selecciona las imagenes que decees Descargar:</p>
            <button type="submit"
                class="ml-10 my-5 rounded-lg text-white py-3 px-8 bg-black">Descargar</button>
        </form>

        </div>

    </div>
</div>
<script>
    const descqr = document.getElementById('descargarQR')
    var imaqr = document.getElementById('imaqr');
    descqr.addEventListener('click', async () => {
        descqr.setAttribute('href', imaqr.src);
        descqr.setAttribute('download', 'qrevento.png');
    });
</script>

<link rel="stylesheet" href="{{ asset('css/imagen.css') }}" type="text/css">
