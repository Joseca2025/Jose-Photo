@extends('layouts.sidebar')

@section('title', $evento->nombre)

@section('content')

{{-- <div class="container">
    <div class="text-start flex">
        <h2 class="text-2xl font-bold text-primary-dark dark:text-light p-5">Eventos en los que participo {{user}}</h2>
    </div>
</div> --}}
@livewireScripts
@livewireStyles

@livewire('fotografo.catalogo.vista-fotos',[$evento->id])


@endsection


@section('css')
@stop

@section('js')
@stop
