@extends('layouts.sidebar')

@section('title', 'Lista de fotografos')

@section('content')

<div class="">
    <div class="container px-6 mb-3">
        <div class="text-start">
            <h2 class="text-2xl text-black dark:text-light font-bold pt-3 text-center" style="font-family: 'Times New Roman', serif;">Lista de fotografos para el evento: {{ $evento->nombre }}</h2>
        </div>
    </div>

    @livewire('organizador.mis-eventos.tabla-fotografos', [$evento])

</div>




@endsection


@section('css')
    @livewireStyles
@stop

@section('js')

    @livewireScripts
@stop
