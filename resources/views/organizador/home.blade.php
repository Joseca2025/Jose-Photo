@extends('layouts.sidebar')

@section('title', 'Organizador')

@section('content')

<div class="">
  @include('organizador.components.paginainicio')
</div>


@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
