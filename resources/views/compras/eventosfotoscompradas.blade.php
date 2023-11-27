@extends('layouts.sidebar')

@section('title', 'Lista de Eventos')

@section('content')


@livewire('usuarios.compras.lista-eventos-compra')

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts

@stop
