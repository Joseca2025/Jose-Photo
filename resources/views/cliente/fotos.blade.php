@extends('layouts.sidebar')

@section('title', 'Cliente')

@section('content')
<div class="flex items-center justify-between px-4 py-4 border-b lg:py-6 dark:border-primary-darker">
    <h1 class="text-2xl font-semibold">Dashboard</h1>
    <a
      href="https://github.com/Kamona-WD/kwd-dashboard"
      target="_blank"
      class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark"
    >
      View on github
    </a>
  </div>


  soy el cliente

@endsection


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    @livewireStyles
@stop

@section('js')
    <script>
        console.log('hi!')
    </script>
    @livewireScripts
@stop
