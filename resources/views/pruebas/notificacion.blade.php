@extends('layouts.sidebar')

@section('title', 'Notificacion')

@section('content')

@livewire('prueba.noti-form')
@livewire('prueba.noti-list')

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
