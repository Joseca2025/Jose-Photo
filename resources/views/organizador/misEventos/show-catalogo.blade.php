@extends('layouts.sidebar')

@section('title', 'Catalogo')

@section('content')


    @livewire('organizador.mis-eventos.show-catalogo', [$evento->id])





@endsection


@section('css')
    @livewireStyles
@stop

@section('js')

    @livewireScripts
@stop
