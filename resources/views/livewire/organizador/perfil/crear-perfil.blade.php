<div>

    <button wire:click="$set('open', true)"
        class="font-bold bg-gray-500 hover:bg-gray-500 text-white  px-10 py-2 transition-colors transition duration-500 hover:scale-105">
        Informacion personal 
    </button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            <h1><strong class="uppercase">Datos Personales</strong></h1>
        </x-slot>
        <x-slot name="content">
            <x-jet-label value="Nombre:" class="mb-2 ml-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su Nombre" wire:model.defer="nombre">
            </x-jet-input>

            @error('nombre')
                <span class="text-left text-red-500 ">Su nombre es incorrecto</span>
            @enderror

            <x-jet-label value="Correo Electronico:" class="mb-2 ml-2 mt-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su E-mail" wire:model.defer="email">
            </x-jet-input>
            @error('email')
                <span class="text-left text-red-500 ">Su Correo Electronico es incorrecto</span>
            @enderror

            <div class="grid grid-cols-2 gap-1 justify-evenly mt-2">
                <div>
                    <x-jet-label value="Telefono:" class="mb-2 ml-2 text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" placeholder="Escriba su Telefono"
                        wire:model.defer="telefono"></x-jet-input>
                    @error('telefono')
                        <span class="text-left text-red-500 ">Su Telefono es incorrecto</span>
                    @enderror
                </div>

                <div>
                    <x-jet-label value="DNI:" class="mb-2 ml-2 text-left"></x-jet-label>
                    <x-jet-input type="text" class="w-full" placeholder="Escriba su DNI" wire:model.defer="dni">
                    </x-jet-input>
                    @error('dni')
                        <span class="text-left text-red-500 ">Su DNI es incorrecto</span>
                    @enderror
                </div>
            </div>


            <x-jet-label value="Direccion:" class="mb-2 ml-2 mt-2 text-left"></x-jet-label>
            <x-jet-input type="text" class="w-full" placeholder="Escriba su Direccion" wire:model.defer="direccion">
            </x-jet-input>
            @error('direccion')
                <span class="text-left text-red-500 ">Su Direccion es incorrecta</span>
            @enderror

            <x-jet-label value="Fecha de Nacimiento:" class="mb-2 mt-2 ml-2 text-left"></x-jet-label>
            <x-jet-input type="date" class="w-full" wire:model.defer="fnacimiento"></x-jet-input>
            @error('fnacimiento')
                <span class="text-left text-red-500 ">Su Fecha de nacimiento es incorrecta</span>
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
