@extends('layouts.sidebar')

@section('title', 'Cliente')

@section('content')
    <!-- Content -->
        <div class="">
            @include('fotografo.components.paginainicio')
        </div>



@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
