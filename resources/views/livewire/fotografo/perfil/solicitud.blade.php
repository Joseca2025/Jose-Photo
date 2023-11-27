<div>

    <?php
    $iduserorganizador = DB::table('organizadors')
        ->where('id', $notificacion->idorganizador)
        ->value('iduser');
    $userorga = DB::table('users')
        ->where('id', $iduserorganizador)
        ->first();
    $iduserfotografo = DB::table('fotografos')
        ->where('id', $notificacion->idfotografo)
        ->value('iduser');
    $userfoto = DB::table('users')
        ->where('id', $iduserfotografo)
        ->first();
    $evento = DB::table('eventos')
        ->where('id', $notificacion->idevento)
        ->first();
    $paquete_foto = DB::table('paquete_fotos')
        ->where('id', $notificacion->idpaquete_foto)
        ->first();
    ?>
    <div class="flex items-center justify-center text-slate-500">
        <button type="button" wire:click="$set('aceptar', true)"
        class="bg-black focus:ring-4 focus:outline-none text-white px-5 py-2.5 text-center mr-2 mb-2 transition-colors duration-500">Si acepto</button>
        <button type="button" wire:click="$set('rechazar', true)"
            class="text-white bg-gray-500     focus:ring-4 focus:outline-none   shadow-lg    text-sm px-5 py-2.5 text-center mr-2 mb-2 transition-colors duration-500 ">Rechazo el trabajo</button>
    </div>

    <x-jet-dialog-modal wire:model="aceptar">

        <x-slot name="title">
            <h1><strong class="uppercase"
                style="font-family: 'Times New Roman', serif;">{{ $userfoto->name }}</strong></h1>
        </x-slot>

        <x-slot name="content">
            <div
                class="block text-center p-6 w-full bg-white  border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-400 dark:border-gray-400 dark:hover:bg-gray-400">
                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white"
                style="font-family: 'Times New Roman', serif;">Acepto el trabajo para: <strong class="text-white uppercase"
                style="font-family: 'Times New Roman', serif;">{{ $userorga->name }}</strong>
                    De la peticion del paquete de: <strong class="text-white uppercase"
                    style="font-family: 'Times New Roman', serif;">{{ $paquete_foto->nombre }}</strong></h5>

                <p class="font-normal text-white  mt-5"
                style="font-family: 'Times New Roman', serif;">Para asistir al evento:
                    <Strong class="text-white uppercase">{{ $evento->nombre }}</Strong>.
                </p>
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('aceptar', false)" class="mr-2">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="aceptarSolicitud({{$notificacion->id}})">
                Aceptar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>



    <x-jet-dialog-modal wire:model="rechazar">

        <x-slot name="title">
            <h1><strong class="uppercase"
                style="font-family: 'Times New Roman', serif;">{{ $userfoto->name }}</strong></h1>
        </x-slot>

        <x-slot name="content">
            <div
                class="block text-center p-6 w-full bg-white  border border-gray-200 shadow-md  dark:bg-gray-400 ">
                <h5 class="mb-2 text-2xl tracking-tight text-gray-900 dark:text-white"
                style="font-family: 'Times New Roman', serif;">Deseas denegar el servicio que te pidieron: <strong class="text-white uppercase"
                style="font-family: 'Times New Roman', serif;">{{ $userorga->name }}</strong>
                    por el serivicio de: <strong class="text-white uppercase"
                    style="font-family: 'Times New Roman', serif;">{{ $paquete_foto->nombre }}</strong></h5>

                <p class="font-normal text-white"
                style="font-family: 'Times New Roman', serif;">Por tu presencia en el evento de:
                    <Strong class="text-white uppercase"
                    style="font-family: 'Times New Roman', serif;">{{ $evento->nombre }}</Strong>.
                </p>
            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('rechazar', false)" class="mr-2">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="rechazarSolicitud({{$notificacion->id}})">
                Aceptar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>

</div>


<div id="contenedorQR" hidden>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js" integrity="sha512-CNgIRecGo7nphbeZ04Sc13ka07paqdeTu0WR1IM4kNcpmBAUSHSQX0FslNhTDadL4O5SAGapGt4FodqL8My0mA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    Livewire.on('crear-qr', () => {
        const evento = <?php echo json_encode($evento); ?>;
        const resultado = new QRCode(contenedorQR, 'http://18.191.234.61/Catalogo/porqr/' + evento.id);
        const canvas = document.querySelector('#contenedorQR canvas');
        var imagen = canvas.toDataURL();
        Livewire.emit('generarQr', imagen, evento.id);
    });


</script>
