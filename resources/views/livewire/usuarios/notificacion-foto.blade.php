<div>
    @foreach ($notificaciones as $notificacion)
        <?php
        $evento = DB::table('eventos')
            ->where('id', $notificacion->idevento)
            ->first();
        $orga = DB::table('organizadors')
            ->where('id', $evento->idorganizador)
            ->first();
        $userorga = DB::table('users')
            ->where('id', $orga->iduser)
            ->first();
        
        ?>
        <a href="{{ route('usuarios.apareces-foto', $notificacion->id) }}" class="block mb-3 dark:text-light hover:bg-primary-100 dark:hover:bg-primary">
            <div class="flex px-4 space-x-4">
                <div class="relative flex-shrink-0">
                    <span
                        class="z-10 inline-block p-2 overflow-visible rounded-full bg-primary-50 text-primary-light dark:bg-primary-darker">
                        <svg class="w-7 h-7 text-gray-500 border border-black  p-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </span>
                    <div class="absolute h-24 p-px -mt-3 -ml-px bg-primary-50 left-1/2 dark:bg-primary-darker"></div>
                </div>
                <div class="flex-1 overflow-hidden">
                    <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                        Apareces en una foto del evento: <strong
                            class="inline-block font-bold tracking-wider text-primary-dark dark:text-light">{{ $evento->nombre }}</strong>
                    </h5>
                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                        Realizado por:
                        <strong
                            class="inline-block font-bold tracking-wider text-primary-dark dark:text-light">{{ $userorga->name }}</strong>
                    </p>
                    <p class="text-sm font-normal text-gray-400 truncate dark:text-primary-lighter">
                        En:
                        <strong
                            class="inline-block font-bold tracking-wider text-primary-dark dark:text-light">{{ $evento->direccion }}</strong>

                    </p>


                    <span class="text-sm font-normal text-gray-400 dark:text-primary-light">
                        {{ $notificacion->created_at }} </span>
                </div>
            </div>
        </a>
    @endforeach
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.8/push.js" integrity="sha512-x0GVeKL5uwqADbWOobFCUK4zTI+MAXX/b7dwpCVfi/RT6jSLkSEzzy/ist27Iz3/CWzSvvbK2GBIiT7D4ZxtPg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('606975d0ee229a82f40f', {
        cluster: 'sa1'
    });

    var channel = pusher.subscribe('faceapi-channel');
    channel.bind('faceapi-event', function(idevento) {
        //alert(JSON.stringify(data));
        Livewire.emit('notificacionFaceApiRecibida', idevento);
        const imagen = '{{ asset('icono/foto.jpg') }}'; 
        Push.create('Aparaces en una foto',{
            body:"Aparaces en una foto",
            timeout: 5000,
            icon: imagen
        });
    });
</script>
