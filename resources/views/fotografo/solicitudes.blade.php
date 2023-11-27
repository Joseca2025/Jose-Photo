@extends('layouts.sidebar')

@section('title', 'Solicitudes')
@livewireStyles
@livewireScripts

@section('content')

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
    
    use Carbon\Carbon;
    $hoy = Carbon::now();
    $creacion = Carbon::parse($notificacion->created_at);
    $tiempo =  $creacion->diffForHumans($hoy);

    
   
    ?>

    <div class="">
        <div class='flex items-center justify-center pt-20'>
            <div class=" border p-5 shadow-md w-9/12 bg-white">
                <div class="flex w-full items-center justify-cen border-b pb-3">
                    <div class="flex items-center space-x-3">
                        
                        <div class="text-lg font-bold text-black uppercase"
                        style="font-family: 'Times New Roman', serif;">{{ $userfoto->name }}</div>
                    </div>
                    
                </div>

                <div class="mt-4 mb-6">
                    <div class="mb-3 text-xl font-bold"
                    style="font-family: 'Times New Roman', serif;">Propuesta de trabajo para la reunion de: <strong
                            class="uppercase"
                            style="font-family: 'Times New Roman', serif;">{{ $evento->nombre }}</strong>
                    </div>
                    <div class="text-sm text-black"
                    style="font-family: 'Times New Roman', serif;">Propuesta de: <strong class="uppercase text-black">
                            {{ $userorga->name }}</strong></div>
                    <br>
                    <div class="text-sm text-black"
                    style="font-family: 'Times New Roman', serif;">Paquete deseado: <strong
                            class="uppercase">{{ $paquete_foto->nombre }}</strong> 
                       
                    </div>
                    <br>
                    <div class="text-sm text-black"
                    style="font-family: 'Times New Roman', serif;"><strong>Direccion: </strong> {{ $evento->direccion }}.</div>
                    <div class="text-sm text-black"
                    style="font-family: 'Times New Roman', serif;"><strong>En la fecha: </strong> {{ $evento->fecha }}. </div>
                    <div class="text-sm text-black"
                    style="font-family: 'Times New Roman', serif;"><strong>A las: </strong> {{ $evento->hora }} Horas.</div>

                </div>

                <div>
                    @livewire('fotografo.perfil.solicitud', [$notificacion->id])
                </div>
            </div>
        </div>
        <br><br><br><br><br>
    </div>
@endsection


@section('css')

@stop

@section('js')

@stop
