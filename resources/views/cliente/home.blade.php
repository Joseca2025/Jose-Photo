@extends('layouts.sidebar')

@section('title', 'Cliente')

@section('content')

@include('organizador.components.paginainicio')

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
