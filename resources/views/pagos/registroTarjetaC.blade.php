@extends('layouts.navbar')

@section('title', 'Reg CC')

@section('content')

<br>
<br>


    <section class="bg-white border-b py-8">
     
        <div class="container mx-auto flex flex-wrap pt-4 pb-12">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Registra tu Debito
            </h2>
            <div class="w-full mb-4">
                <div class="h-1 mx-auto gradient w-66 opacity-25 my-0 py-0 rounded-t"></div>
            </div>

            <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink text-black">
                <form class="flex flex-wrap gap-3 w-full p-5" action="{{ route('paquete.guardarTarjetaC', $paquete->id) }}" method="GET">
                    <label class="relative w-full flex flex-col">
                        <span class="font-bold mb-3">Card number</span>

                        <input class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                            type="text" id="numero" name="numero" placeholder="0000 0000 0000 0000" />


                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </label>


                    <label class="relative flex-1 flex flex-col">
                        <span class="font-bold mb-3">Expire date (MM/YY)</span>

                        <input class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                            type="text" id="fecha" name="fecha" placeholder="MM/YY" />


                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>

                    </label>


                    <label class="relative flex-1 flex flex-col">
                        <span class="font-bold flex items-center gap-3 mb-3">
                            CVC/CVV
                            <span class="relative group">
                                <span
                                    class="hidden group-hover:flex justify-center items-center px-2 py-1 text-xs absolute -right-2 transform translate-x-full -translate-y-1/2 w-max top-1/2 bg-black text-white">
                                    Hey ceci est une infobulle !</span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </span>

                        <input class="rounded-md peer pl-12 pr-2 py-2 border-2 border-gray-200 placeholder-gray-300"
                            type="text" id="cvc" name="cvc" placeholder="&bull;&bull;&bull;" />

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="absolute bottom-0 left-0 -mb-0.5 transform translate-x-1/2 -translate-y-1/2 text-black peer-placeholder-shown:text-gray-300 h-6 w-6"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>

                    </label>

                    <br>

                    <button type="submit"
                        class="font-bold bg-yellow-400 hover:bg-yellow-700 text-white rounded-md px-10 py-2 transition-colors w-full mt-5">Guardar
                    </button>

                    @error('numero')
                        <script>
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Tarjeta no aceptada por Datos Incorrectos',
                            })
                        </script>
                    @enderror
                    @error('cvc')
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Tarjeta no aceptada por Datos Incorrectos',
                        })
                    </script>
                @enderror
                @error('fecha')
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Tarjeta no aceptada por Datos Incorrectos',
                    })
                </script>
            @enderror

                </form>
            </div>
            <div class="w-full md:w-1/2 p-6 flex flex-col flex-grow flex-shrink ">
                <img class="rounded-xl "
                    src="https://d31dn7nfpuwjnm.cloudfront.net/images/valoraciones/0043/4919/cual-es-numero-tarjeta.jpg?1619029712"
                    alt="">
            </div>


        </div>
    </section>



@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
