<div class="container mx-auto px-6 py-20 md:px-12 lg:px-20">
    <div class="text-center">
        <h2 class="text-2xl font-mono text-black font-bold md:text-4xl">Bienvenido <strong class="uppercase">{{ auth()->user()->name }}</strong></h2>
    </div>
    <div class="mt-12 flex">
        <table class="w-1/2 bg-white">
            <tr>
                <td class="text-center">
                    <?php
                    $idpaquete = DB::table('users')->where('id', auth()->user()->id)->value('idpaquete');
                    $paquete = DB::table('paquetes')->where('id', $idpaquete)->first();
                    ?>
                    <h3 class="text-3xl text-gray-700 font-semibold text-center uppercase">{{ $paquete->nombre }}</h3>
                    <div class="flex justify-center">
                        <div class="flex items-end">
                            <span class="text-8xl text-gray-800 font-bold leading-0">{{ $paquete->precio }}</span>
                            <div class="pb-2">
                                <span class="block text-2xl text-black font-bold">$us</span>
                                <span class="block text-xl text-black font-bold">Adquirido</span>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="space-y-4 py-6 text-gray-600">
                        <li class="space-x-2">
                            <span class="text-black font-semibold">&#10008;</span>
                            <span>{{ $paquete->descripcion }}</span>
                        </li>
                    </ul>
                </td>
            </tr>
        </table>
        <div class="mx-4"></div> 
        <table class="w-1/2 bg-white">
            <tr>
                <td class="text-center">
                    <ul role="list" class="space-y-4 py-6 text-gray-600">
                        <li class="space-x-2">
                            <span class="text-black font-semibold">&#10008;</span>
                            <span>Tu paquete adquirido es: <strong class="uppercase">{{ $paquete->nombre }}</strong>.</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-black font-semibold">&#10008;</span>
                            <span>Registra tu Tarjeta de Crédito.</span>
                        </li>
                        <li class="space-x-2">
                            <span class="text-black font-semibold">&#10008;</span>
                            <span><strong>Registra todos tus datos.</strong></span>
                        </li>
                    </ul>
                    <div class="text-center">
                        <!-- Tu contenido Livewire -->
                        @livewire('organizador.perfil.crear-perfil')
                    </div>
                    <div class="mt-6 flex justify-center gap-6">
                        
                    </div>
                </td>
            </tr>
        </table>
    </div>
</div>
