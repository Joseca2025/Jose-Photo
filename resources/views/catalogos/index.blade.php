@extends('layouts.sidebar')

@section('title', 'Catalogos')

@section('content')

    {{-- <div class="container">
    <div class="text-start flex">
        <h2 class="text-2xl font-bold text-primary-dark dark:text-light">Eventos en los que participo</h2>
    </div>
</div> --}}

@livewire('usuarios.catalogo.index')



@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
