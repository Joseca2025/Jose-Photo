<div>

    <style>
        .row {
            height: auto;
            width: 100%;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .contenedor {
            width: 300px;
            height: 300px;
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            left: 20px;
        }

        .descripcion {
            background: red;
            height: 100px;
            width: 100px;
            word-wrap: break-word;
        }
    </style>

    <div class="row">
        @foreach ($paquetes as $item)
            <div class="contenedor relative ">
                <div aria-hidden="true"
                    class="absolute top-0 items-center w-full h-full  bg-white shadow-lg transition duration-500 ">
                    <h3 class="mt-5 font-bold text-3xl text-black text-center uppercase"style="font-family: 'Times New Roman', serif;">
                        {{ $item->nombre }}
                    </h3>

                    <div class="grid justify-center mt-5">
                        <div class="flex items-end">
                            <span class="text-7xl text-black font-bold leading-0">{{ $item->precio }}</span>
                            <div class="pb-2">
                                <span class="block text-2xl text-black font-bold">$us</span>
                            </div>
                        </div>
                    </div>

                    <div class="grid justify-center overflow-x-auto py-3 px-5">
                        <div class="flex items-end">
                            <ul role="list" class="space-y-4 py-6 m-auto text-black">
                                <li class="space-x-2">
                                    
                                    <span>{{$item->descripcion}}</span>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <div class="grid justify-center overflow-x-auto absolute inset-x-0 bottom-7">
       
                            <button wire:click="abrir({{ $item }})"
                                class="block px-10 py-2 border border-gray-400  dark:bg-gray-400 dark:text-light  hover:bg-primary-100 dark:hover:bg-primary">
                            <strong class="">Editar paquete</strong>
                        </button>
                    </div>



                </div>
            </div>
        @endforeach

    </div>



    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1><strong class="uppercase">Editar datos del paquete</strong></h1>
        </x-slot>

        <x-slot name="content">
            <x-jet-label value="Nombre:" class="mb-2 ml-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su Nombre" wire:model="paquete.nombre">
            </x-jet-input>

            @error('paquete.nombre')
                <span class="text-left text-red-500 ">Su nombre es incorrecto</span>
            @enderror

            <x-jet-label value="Descripcion:" class="mb-2 ml-2 mt-2 text-left"></x-jet-label>
            <textarea type="text" name="descripcion" id="descripcion" cols="30" rows="8" class="w-full"
                placeholder="Escriba su descripcion" wire:model="paquete.descripcion"></textarea>

            @error('paquete.descripcion')
                <span class="text-left text-red-500 ">Su descripcion es incorrecta</span>
            @enderror

            <x-jet-label value="Precio:" class="mb-2 ml-2 mt-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su precio" wire:model="paquete.precio">
            </x-jet-input>
            @error('paquete.precio')
                <span class="text-left text-red-500 ">Su precio es incorrecto</span>
            @enderror
        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)" class="mr-2">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="guardar">
                Guardar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>



</div>
