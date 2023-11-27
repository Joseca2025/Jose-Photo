@extends('layouts.sidebar')

@section('title', 'Lista de fotos')

@section('content')


@livewire('usuarios.compras.lista-fotos-compradas', [$idevento])

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts

@stop
