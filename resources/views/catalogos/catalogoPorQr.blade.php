@extends('layouts.sidebar')

@section('title', 'Catalogo')

@section('content')

    <div class="pr-5 pt-5 pl-5 pb-1">
        <div class="bg-white rounded-md dark:bg-darker">
            <!-- Card header -->
            <div class="flex flex-wrap items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-primary-dark dark:text-light">{{ $evento->nombre }}</h4>
            </div>

            <div class="p-7">
                {{-- <div class="flex w-full flex-wrap content-center justify-center">
                </div> --}}
                <div class="grid lg:grid-cols-3 lg:grid-rows-6 sm:grid-cols-2  sm:grid-rows-5 gap-1">
                    <div class="lg:col-span-1 lg:row-span-2 col-span-2 row-span-1 p-1">
                        <strong>Organizador: </strong> {{$organizador->name}}
                    </div>
                    <div class="lg:col-span-1 lg:row-span-2 col-span-2 row-span-1 p-1">
                        <strong>Email: </strong> {{$organizador->email}}
                    </div>
                    <div class="lg:col-span-1 p-1">
                        <strong>Fecha: </strong> {{ $evento->fecha }}
                    </div>
                    <div class="lg:col-span-1 p-1">
                        <strong>Hora: </strong> {{ $evento->hora }}
                    </div>
                    <div class="lg:col-span-3 lg:row-span-2 col-span-1 row-span-2 p-1">
                        <strong>Direccion del Evento: </strong> {{ $evento->direccion }}
                    </div>
                    <div class="lg:col-span-2 lg:row-span-1 p-1">
                        <strong>Fotografo11: </strong> {{ $fotografo->name }}
                    </div>
                    <div class="lg:col-span-1 lg:row-span-1 p-1">
                        <strong>Telefono: </strong> {{ $fotografo->telefono }}
                    </div>
                    <div class="lg:col-span-2 lg:row-span-1 p-1">
                        <strong>Email: </strong> {{ $fotografo->email }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @livewire('usuarios.catalogo.catalogo-por-qr', [$evento->id])




@endsection


@section('css')

    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
