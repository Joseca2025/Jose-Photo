@extends('layouts.navbar')

@section('title', 'Suscripciones')

<link rel="stylesheet" href="{{asset("css/button.css")}}" type="text/css">

@section('content')

    <br><br><br>


    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800 uppercase">
                {{$paquete->nombre}}
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Beneficios:
                    </h3>
                    <p class="text-gray-600 mb-8 text-2xl">
                        {{$paquete->descripcion}}
                        <br />
                        <br>
                        Recibiras ayuda en soporte por parte de nuestro personal, en caso de alguna falla o necesidad.
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6 ">
                   <img class="rounded-3xl" 
                   src="https://i.blogs.es/ea9bbc/album-dest/1366_2000.jpg" alt="">
                </div>
            </div>
            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <img class="rounded-full" 
                    src="https://img.freepik.com/foto-gratis/chicas-haciendo-selfie-fiesta-ano-nuevo_23-2147709223.jpg" alt="">
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Paga Ahora
                        </h3>
                        <p class="text-gray-600 mb-8 text-2xl">
                            Por el modico precio de ($) pasaras a obtener los beneficios de ser: {{$paquete->nombre}} 
                            <br />
                            <br />
                            Click a:
                            <form action="{{ route('paquete.escogePaquete', $paquete->id) }}" method="GET">
                                @csrf
                                <button class="adicamic"
                                style="--clr:#04ba2b"><span>Pagar<i></i></span></button>
                            </form>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>






@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
