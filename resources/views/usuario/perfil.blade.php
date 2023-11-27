@extends('layouts.sidebar')

@section('title', 'Perfil')

@section('content')


@livewire('usuarios.perfil.index')

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts

@stop
