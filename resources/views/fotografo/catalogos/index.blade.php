@extends('layouts.sidebar')

@section('title', 'Catalogos')

@section('content')

<div class="container">
    <div class="text-start flex">
        <h2 class="text-2xl font-bold text-black dark:text-light my-2 ml-2" style="font-family: 'Times New Roman', serif;">Reuniones en los que se sale una o mas fotos</h2>
    </div>
</div>

@livewire('fotografo.catalogo.show-catalogo')


@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
