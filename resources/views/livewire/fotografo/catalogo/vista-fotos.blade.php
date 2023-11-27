<div>
    <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3 ">

        <!-- QR chart card -->
        <div class="bg-gray-200  dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">El QR evento de {{ $evento->nombre }}</h4>
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
                <img class="p-10 w-full h-full absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                    src="{{ $qr->imagen }}" alt="" id="imaqr">
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
            <div class="flex items-center justify-between p-4 ">
                <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Informacion sobre el  evento</h4>
                <a href="{{ route('Fotografo.detalle-ventas', $evento->id) }}" class=" text-white py-3 px-8 bg-black ">Detalle de venta</a>
            </div>
            <!-- Chart -->
            <div class="relative p-4 h-72 overflow-y-auto">
                <div class="grid sm:grid-cols-1 lg:grid-cols-2">
                    <div class="lg:mr-2">
                        <div class="grid grid-rows-5 gap-2 col-span-1">
                            <div class="text-start p-2 row-span-2" style="font-family: 'Times New Roman', serif;">
                                <strong>Direccion: </strong>{{ $evento->direccion }}
                            </div>
                            <div class="text-start p-2 rounded-lg " style="font-family: 'Times New Roman', serif;">
                                <strong>Fecha: </strong>{{ $evento->fecha }}
                            </div>
                            <div class="text-start p-2 rounded-lg " style="font-family: 'Times New Roman', serif;">
                                <strong>Hora: </strong>{{ $evento->hora }}
                            </div>
                            <div class="text-start p-2" style="font-family: 'Times New Roman', serif;">
                                <strong>Fotografo: </strong>{{ $userfoto->name }}
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>

    <div class="p-4">
        <!-- Bar chart card -->
        <div class="bg-gray-200 dark:bg-darker">
            <!-- Card header -->
            <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Subir foto o fotos al catalogo de la fiesta o evento de trabajo</h4>
            </div>

            <!-- Chart -->
            <div class="p-7">
                <form wire:submit.prevent="save">
                    <div class="grid grid-cols-1">
                        <div class="grid col-span-1">
                            <input type="file" name="imagenes[]" id="imagenes" wire:model="photos" multiple
                                accept="image/*" class="border border-dashed border-black">
                            @error('photos')
                                <span class="text-left text-red-500 ">Problema al subir</span>
                            @enderror

                        </div>
                    </div>
                    <div class="grid lg:grid-cols-3 sm:grid-cols-1">
                        <div class="flex m-5">
                            <span
                                class="inline-flex items-center px-3 text-sm text-white bg-gray-200  border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>
                            <input type="text" id="precio" name="precio" wire:model="precio"
                                class=" bg-gray-50 border text-white focus:ring-blue-500 focus:border-blue-500 block text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="precio de cada fotografia">

                        </div>

                        <div>
                            <select name="tipo" id="tipo" wire:model="tipo"
                                class="m-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block pr-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value=""> Seleccionar</option>
                                <option value="publica">Publica</option>
                                <option value="privada">Privada</option>
                                <option value="qr">Qr</option>
                            </select>
                        </div>


                        <div>
                            <button type="submit"
                                class="block m-5 px-5 py-2 border border-black  dark:text-light hover:bg-primary-100 dark:hover:bg-primary transition-colors transition duration-500 hover:scale-105">
                                <i class="fa-solid fa-floppy-disk"></i> Guardar la foto o fotos subidas</button>
                        </div>

                    </div>

                    <div class="grid lg:grid-cols-3 sm:grid-cols-1">
                        <div class="m-5">
                            @error('precio')
                                <span class="text-left text-red-500 ">Problema al subir la foto</span>
                            @enderror
                        </div>

                        <div class="m-5">
                            @error('tipo')
                                <span class="text-left text-red-500 ">Problema al subir la foto</span>
                            @enderror
                        </div>

                    </div>

                    <div class="flex flex-wrap">
                        @if ($photos)
                            <div class="flex flex-wrap">
                                @foreach ($photos as $pic)
                                    <img style="width: 300px; height: 340px; padding: 10px"
                                        src="{{ $pic->temporaryUrl() }}">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </form>
                <div class="" style="font-family: 'Times New Roman', serif;">
                    <strong>Si tus imagenes son publicas se le enviara una notificacion a los clientes que aparecen en ella.</strong>
                    <button hidden id="btnNotificaciones"
                    class="">
                    <i class="fa-solid fa-bell"></i> Notificar </button>
                </div>


            </div>
        </div>
    </div>


    @livewire('fotografo.catalogo.vista-fotos-filtro', [$evento->id])

</div>

<script src="{{ asset('js/face-api.min.js') }}"></script>
<script>
    const descqr = document.getElementById('descargarQR')
    var imaqr = document.getElementById('imaqr');
    descqr.addEventListener('click', async () => {
        descqr.setAttribute('href', imaqr.src);
        descqr.setAttribute('download', 'qrevento.png');
    });
</script>

<script>
    Livewire.on('face-api', (usuarios, idevento) => {
        console.log(usuarios, idevento);
        const imageUpload = document.getElementById('imagenes')
        const btnNotificaciones = document.getElementById('btnNotificaciones')

        
        //cargo los modelos de FACEAPI cuanndo la funcion start comience
        Promise.all([
            faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
            faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
            faceapi.nets.ssdMobilenetv1.loadFromUri('/models')
        ]).then(start)

        function loadLabeledImages() {
            //nombre de las carpetas(usuarios)
            const labels = usuarios;
            return Promise.all(
                labels.map(async label => {
                    const descriptions = [];
                    for (let i = 1; i <= 3; i++) {
                        //console.log(label)
                        const img = await faceapi.fetchImage(`/storage/usuarios/${label}/${i}.jpg`);
                        const detections = await faceapi.detectSingleFace(img).withFaceLandmarks()
                            .withFaceDescriptor();
                        descriptions.push(detections.descriptor);
                        //console.log(label, descriptions)
                    }

                    return new faceapi.LabeledFaceDescriptors(label, descriptions);
                })
            )
        }



        async function start() {

            //obtengo los nombres de las caras de las imagenes del servidor
            const labeledFaceDescriptors = await loadLabeledImages();
            console.log(labeledFaceDescriptors);
            //console.log(labeledFaceDescriptors)

            //que tenga una presicion arriba de 60%
            const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, 0.6);
            console.log(faceMatcher);

            console.log('Listo');
            btnNotificaciones.classList.add("bg-green-300");
            //si cambia el estado del input file
            btnNotificaciones.addEventListener('click', async () => {
 
                //obtengo la imagen subida en el input
                resultados = [];
                for (i = 0; i < imageUpload.files.length; i++) {
                    image = await faceapi.bufferToImage(imageUpload.files[i]);
                    const displaySize = {
                        width: image.width,
                        height: image.height
                    };
                    //detecta todas las caras de la imagagen del input
                    const detections = await faceapi.detectAllFaces(image).withFaceLandmarks()
                        .withFaceDescriptors();

                    const resizedDetections = faceapi.resizeResults(detections, displaySize);

                    //las coincidencias
                    const results = resizedDetections.map(d => faceMatcher.findBestMatch(d
                        .descriptor));

                    resultados.push(results);
                }
                console.log(resultados);
                idusuarios = []
                for (i = 0; i < resultados.length; i++) {
                    let result = resultados[i];
                    for (j = 0; j < result.length ; j++) {
                        //console.log(result[j].label)
                        idusuarios.push(result[j].label);
                    };
                }
                console.log(idusuarios);
                Livewire.emit('notiAparecesFoto', idusuarios, idevento);
            })
            btnNotificaciones.click()


        }
    });
</script>

<link rel="stylesheet" href="{{ asset('css/imagen.css') }}" type="text/css">
