<div class="overflow-x-auto relative  ">

    @if ($solicitudes->count())
        <?php
        $contador = 0;
        ?>

        <table class="table">
            <thead>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Id</th>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Fotografo</th>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Paquete</th>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Precio</th>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Estado</th>
                <th class="bg-gray-500" style="font-family: 'Times New Roman', serif;">Accion</th>
            </thead>
            <tbody>
                @foreach ($solicitudes as $solicitud)
                    <?php
                    $iduserfotografo = DB::table('fotografos')
                        ->where('id', $solicitud->idfotografo)
                        ->value('iduser');
                    $userfoto = DB::table('users')
                        ->where('id', $iduserfotografo)
                        ->first();
                    $evento = DB::table('eventos')
                        ->where('id', $solicitud->idevento)
                        ->first();
                    $paquete_foto = DB::table('paquete_fotos')
                        ->where('id', $solicitud->idpaquete_foto)
                        ->first();
                    $contador = $contador + 1;
                    ?>
                    <tr>
                        <td data-label="Id" style="font-family: 'Times New Roman', serif;">{{ $contador }}</td>
                        <td data-label="Fotografo" style="font-family: 'Times New Roman', serif;">{{ $userfoto->name }}</td>
                        <td data-label="Paquete" style="font-family: 'Times New Roman', serif;">{{ $paquete_foto->nombre }}</td>
                        <td data-label="Precio" style="font-family: 'Times New Roman', serif;">{{ $paquete_foto->precio }} $us</td>
                        <td data-label="Estado" style="font-family: 'Times New Roman', serif;">
                            @if ($solicitud->estado == 'espera')
                                <div class="flex">
                                    <div class="h-4 w-4 rounded-full bg-orange-400 mr-2"></div> En espera
                            @endif

                            @if ($solicitud->estado == 'aceptado')
                                <div class="flex">
                                    <div class="h-4 w-4 rounded-full bg-green-400 mr-2"></div> Aceptado
                                </div>
                            @endif

                            @if ($solicitud->estado == 'rechazado')
                                <div class="flex">
                                    <div class="h-4 w-4 rounded-full bg-red-400 mr-2"></div> rechazado
                                </div>
                            @endif
                        </td>
                        <td data-label="Accion">

                            @if ($solicitud->estado != 'aceptado')
                                <button type="button" wire:click="eliminar({{ $solicitud->id }})"
                                    class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 
                                    dark:focus:ring-red-800 font-medium  text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    <i class="fa-regular fa-trash-can"></i>
                                </button>
                            @else
                        </td>
                @endif
    @endforeach
    </td>
    </tr>
    </tbody>
    </table>
@else
    <div class="mt-8 text-red-800">
        <strong class="text-primary-dark dark:text-light" style="font-family: 'Times New Roman', serif;"> No hay Registros</strong>
    </div>
    @endif

</div>

<link rel="stylesheet" href="{{ asset('css/tablaSolicitudes.css') }}" type="text/css">



<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('606975d0ee229a82f40f', {
        cluster: 'sa1'
    });

    var channel = pusher.subscribe('respuesta-channel');
    channel.bind('respuesta-event', function(data) {
        //alert(JSON.stringify(data));
        Livewire.emit('respuestaRecibida', data);
    });
</script>
