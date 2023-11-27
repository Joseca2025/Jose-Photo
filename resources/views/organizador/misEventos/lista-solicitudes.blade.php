@extends('layouts.sidebar')

@section('title', 'Lista de Solicitudes')

@section('content')


    <div class="container px-6 mb-3">
        <div class="text-start">
            <h2 class="text-2xl text-black font-bold pt-3 text-center" style="font-family: 'Times New Roman', serif;">Lista de peticiones: <strong class="uppercase">{{ $evento->nombre }}</strong> </h2>
        </div>
        <div class="mt-5">
            @livewire('organizador.mis-eventos.lista-solicitudes', [$evento->id])

        </div>

    </div>





@endsection


@section('css')
    @livewireStyles
@stop

@section('js')

    @livewireScripts
@stop
