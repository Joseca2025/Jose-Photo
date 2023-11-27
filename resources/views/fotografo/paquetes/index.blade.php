@extends('layouts.sidebar')

@section('title', 'Cliente')

@section('content')

@include('fotografo.components.tabla-de-paquetes')



@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
