<div class="">
    <div class="container mt-2 md:px-12 lg:px-20">
        <div class="m-auto text-center">
            <h2 class="text-2xl text-black dark:text-light font-bold md:text-4xl" style="font-family: 'Times New Roman', serif;">
                Bienvenido <strong class="uppercase">{{ auth()->user()->name }}</strong> a Jose-Photo
            </h2>
        </div>
        <div class="mt-12 m-auto md:flex md:space-x-8">
            <div class="w-full md:w-1/2 lg:w-5/12 bg-white border border-black">
                <div class="relative z-10 group p-6">
                    <?php
                    $idpaquete = DB::table('users')->where('id', auth()->user()->id)->value('idpaquete');
                    $paquete = DB::table('paquetes')->where('id', $idpaquete)->first();
                    ?>
                    <h3 class="text-3xl text-black font-semibold text-center uppercase">{{ $paquete->nombre }}</h3>
                    <div class="relative flex justify-around">
                        <div class="flex items-end">
                            <span class="text-8xl text-black font-bold leading-0">{{ $paquete->precio }}</span>
                            <div class="pb-2">
                                <span class="block text-2xl text-black font-bold">$us</span>
                                <span class="block text-xl text-black font-bold">Adquirido</span>
                            </div>
                        </div>
                    </div>
                    <ul role="list" class="space-y-4 py-6 m-auto text-black">
                        <li class="space-x-2">
                            <span>{{ $paquete->descripcion }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="w-full md:w-1/2 lg:w-7/12 bg-white border border-black">
                <div class="relative group p-6">
                    <ul role="list" class="space-y-4 py-6 text-black">
                        <li class="space-x-2">
                            <span>Tu paquete adquirido es: <strong class="uppercase">{{ $paquete->nombre }}</strong>.</span>
                        </li>
                        <li class="space-x-2">
                            <span>Registra tu Tarjeta de Crédito.</span>
                        </li>
                        <li class="space-x-2">
                            <span><strong>Registra todos tus datos personales.</strong></span>
                        </li>
                    </ul>
                    <div class="text-center">
                        @livewire('fotografo.perfil.crear-perfil')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
