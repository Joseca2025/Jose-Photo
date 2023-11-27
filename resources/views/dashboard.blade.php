@extends('layouts.navbar')

@section('title', 'Inicio')

@section('content')

    <br>
    <br>
    <br>

    <section class="bg-white py-8">
        <div class="w-full mx-auto bg-white px-5 py-10 text-gray-600 mb-10">
            <div class="max-w-5xl mx-auto md:flex">
                <div class="md:w-1/4 md:flex md:flex-col">
                    <h1 class="text-4xl font-bold mb-5 text-center">Paquetes</h1>
                    <div class="w-full flex-grow md:pr-5 ">

                        <h3 class="text-md font-medium mb-5 text-center">Escoge tu paquete dependiendo a las necesidades que
                            tengas.</h3>
                        <br>
                        <img src="https://img.freepik.com/foto-gratis/selfie-amigos-fiesta_23-2148231967.jpg" alt=""
                            class="rounded-3xl md:w-4/5">

                    </div>
                </div>

                <div class="md:w-3/4">
                    <?php
                    $paquete1 = DB::table('paquetes')
                        ->where('id', 1)
                        ->first();
                    $paquete2 = DB::table('paquetes')
                        ->where('id', 2)
                        ->first();
                    $paquete3 = DB::table('paquetes')
                        ->where('id', 3)
                        ->first();
                    ?>

                    <div class="max-w-4xl mx-auto md:flex">
                        <div
                            class="w-full md:w-1/3 md:max-w-none bg-green-100 px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col border transform transition hover:scale-105 duration-300">
                            <div class="w-full flex-grow">
                                <h2 class="text-center font-bold uppercase mb-4">{{ $paquete1->nombre }}</h2>
                                <h3 class="text-center font-bold text-4xl mb-5">${{ $paquete1->precio }}<span
                                        class="text-sm">/mo</span></h3>
                                <ul class="text-sm mb-8">
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i><strong>Beneficios:</strong></li>
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i>{{ $paquete1->descripcion }}</li>
                                </ul>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('paquete.vistaPago', $paquete1->id) }}"
                                    class="font-bold bg-gray-500 hover:bg-green-700 text-white rounded-md px-10 py-2 transition-colors w-full">Suscribirme
                                </a>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-1/3 md:max-w-none bg-gray-100 px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:-mx-3 md:mb-0 rounded-md shadow-lg shadow-gray-600 md:relative md:flex md:flex-col border transform transition hover:scale-105 duration-300">
                            <div class="w-full flex-grow">
                                <h2 class="text-center font-bold uppercase mb-4">{{ $paquete2->nombre }}</h2>
                                <h3 class="text-center font-bold text-4xl md:text-5xl mb-5">${{ $paquete2->precio }}<span
                                        class="text-sm">/mo</span></h3>
                                <ul class="text-sm mb-8">
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i><strong>Beneficios:</strong>
                                    </li>
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i>{{ $paquete2->descripcion }}</li>
                                </ul>
                            </div>
                            <div class="w-full">
                                <a href="{{ route('paquete.vistaPago', $paquete2->id) }}"
                                    class="font-bold bg-gray-500 hover:bg-gray-800 text-white rounded-md px-10 py-2 transition-colors w-full">Suscribirme
                                </a>
                            </div>
                        </div>
                        <div
                            class="w-full md:w-1/3 md:max-w-none bg-yellow-100 px-8 md:px-10 py-8 md:py-10 mb-3 mx-auto md:my-2 rounded-md shadow-lg shadow-gray-600 md:flex md:flex-col border transform transition hover:scale-105 duration-300">
                            <div class="w-full flex-grow">
                                <h2 class="text-center font-bold uppercase mb-4">{{ $paquete3->nombre }}</h2>
                                <h3 class="text-center font-bold text-4xl mb-5">${{ $paquete3->precio }}<span class="text-sm">/mo</span></h3>
                                <ul class="text-sm mb-8">
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i><strong>Beneficios:</strong>
                                    </li>
                                    <li class="leading-tight"><i
                                            class="mdi mdi-check-bold text-lg"></i>{{ $paquete3->descripcion }}</li>
                                </ul>
                            </div>
                            <div class="w-full">
                                <div class="mt-3 text-center pb-3">
                                    <a href="{{ route('paquete.vistaPago', $paquete3->id) }}"
                                        class="font-bold bg-gray-500 hover:bg-yellow-700 text-white rounded-md px-10 py-2 transition-colors w-full">Suscribirme
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </section>


    <section class="bg-gray-100 py-8">

    </section>

@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
