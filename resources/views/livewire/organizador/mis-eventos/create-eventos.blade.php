<div>

    <button wire:click="$set('open', true)"
        class=" block ml-2 px-5 py-2 border border-black  dark:text-light hover:bg-primary-100 dark:hover:bg-primary transition-colors transition duration-500 hover:scale-105">
        Crear
    </button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1><strong class="uppercase">Nuevo Evento</strong></h1>
        </x-slot>
        <x-slot name="content">
            <x-jet-label value="Nombre:" class="mb-2 ml-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su Nombre" wire:model.defer="nombre">
            </x-jet-input>

            @error('nombre')
                <span class="text-left text-red-500 ">Su nombre del evento es incorrecto</span>
            @enderror

            <x-jet-label value="direccion" class="mb-2 ml-2 mt-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su Direccion" wire:model.defer="direccion">
            </x-jet-input>
            {{$direccion}}
            @error('direccion')
                <span class="text-left text-red-500 ">La direccion es incorrecta</span>
            @enderror

            <div class="grid grid-cols-2 gap-1 justify-evenly mt-2">

                <div>
                    <x-jet-label value="Fecha:" class="mb-2 mt-2 ml-2 text-left"></x-jet-label>
                    <x-jet-input type="date" class="w-full" wire:model.defer="fecha"></x-jet-input>
                    @error('fecha')
                        <span class="text-left text-red-500 ">La Fecha es incorrecta</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label value="Hora:" class="mb-2 mt-2 ml-2 text-left"></x-jet-label>
                    <x-jet-input type="time" class="w-full" wire:model.defer="hora"></x-jet-input>
                    @error('hora')
                        <span class="text-left text-red-500 ">La Hora es incorrecta</span>
                    @enderror
                </div>


            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button wire:click="$set('open', false)" class="mr-2">
                cancelar
            </x-jet-secondary-button>

            <x-jet-danger-button wire:click="save">
                Guardar
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>


</div>
