@extends('layouts.sidebar')

@section('title', 'Cliente')

@section('content')


    <div class="container">
        <div class="text-start flex">
            <h2 class="text-lg font-bold text-blackdark:text-light"style="font-family: 'Times New Roman', serif;">Mis trabajos creados</h2>
        </div>
    </div>

    @livewire('organizador.mis-eventos.show-eventos')



@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    <script>
        console.log('hi!')
    </script>
    @livewireScripts
@stop
