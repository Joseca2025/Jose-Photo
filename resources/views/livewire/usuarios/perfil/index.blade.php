<div class="m-2">
    <!-- Bar chart card -->
    <div class="bg-gray-300  dark:bg-darker">
        <!-- Card header -->
      

        <form wire:submit.prevent="guardar">
            <div class="p-7">
                <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-1 justify-evenly mt-2">
                    <div>
                        <label class="mb-2 ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Nombre:</label>
                        <x-jet-input type="text" class="w-full "  placeholder="Escriba su Nombre"
                            wire:model.defer="nombre">
                        </x-jet-input>

                        @error('nombre')
                            <span class="text-left text-red-500 ">Su nombre es incorrecto</span>
                        @enderror

                    </div>

                    <div>
                        <label class="mb-2 ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Correo
                            Electronico:</label>
                        <x-jet-input type="text" class="w-full" placeholder="Escriba su E-mail"
                            wire:model.defer="email">
                        </x-jet-input>
                        @error('email')
                            <span class="text-left text-red-500 ">Su Correo Electronico es incorrecto</span>
                        @enderror

                    </div>

                </div>


                <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-1 justify-evenly mt-2">
                    <div>
                        <label class="mb-2 ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Telefono:</label>
                        <x-jet-input type="text" class="w-full" placeholder="Escriba su Telefono"
                            wire:model.defer="telefono"></x-jet-input>
                        @error('telefono')
                            <span class="text-left text-red-500 ">Su Telefono es incorrecto</span>
                        @enderror
                    </div>

                    <div>
                        <label class="mb-2 ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Carnet:</label>
                        <x-jet-input type="text" class="w-full" placeholder="Escriba su DNI"
                            wire:model.defer="dni">
                        </x-jet-input>
                        @error('dni')
                            <span class="text-left text-red-500 ">Su DNI es incorrecto</span>
                        @enderror
                    </div>
                </div>

                <div class="grid lg:grid-cols-2 sm:grid-cols-1 gap-1 justify-evenly mt-2">

                    <div>
                        <label class="mb-2 ml-2 text-left text-black dark:text-light " style="font-family: 'Times New Roman', serif;">Fecha de
                            nacimiento:</label>
                        <x-jet-input type="date" class="w-full" wire:model.defer="fnacimiento"></x-jet-input>
                        @error('fnacimiento')
                            <span class="text-left text-red-500 ">Su Fecha de nacimiento es incorrecta</span>
                        @enderror

                    </div>

                    <div>
                        <label
                            class="mb-2 ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Direccion:</label>
                        <textarea type="text" class="w-full " rows="4" placeholder="Escriba su Direccion"
                            wire:model.defer="direccion">
                        </textarea>
                        @error('direccion')
                            <span class="text-left text-red-500 ">Su Direccion es incorrecta</span>
                        @enderror

                    </div>

                </div>
                <div>
                    <label class="ml-2 text-left text-black dark:text-light font-bold" style="font-family: 'Times New Roman', serif;">Imagenes:</label>
                    <label for="dropzone-file"
                        class="mb-2 mt-2 cursor-pointer flex w-full max-w-lg flex-col items-center  border-2 border-dashed border-black bg-white p-6 text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-500 dark:text-light"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="F" stroke-linejoin="round"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>

                        <h2 class="mt-4 text-xl font-medium text-black tracking-wide" style="font-family: 'Times New Roman', serif;">Publicar foto
                        </h2>

                       

                        <input id="dropzone-file" name="imagenes[]" id="imagenes" type="file" wire:model="photos"
                            multiple accept="image/*" class="border border-dashed border-black hidden" />
                </div>

                <div class="flex flex-wrap">
                    @if (count($photos) < 4)
                        <div class="flex flex-wrap">
                            @foreach ($photos as $pic)
                                <img style="width: 300px; height: 340px; padding: 10px"
                                    src="{{ $pic->temporaryUrl() }}">
                            @endforeach
                        </div>
                    @else
                        <div>
                            <strong class="text-red-500">Solo puedes subir 3 imagenes</strong>
                        </div>
                    @endif
                </div>

                <button type="submit"
                    class="block m-5 px-5 py-2  text-white bg-gradient-to-r from-gray-400 to-gray-400 transition-colors transition duration-500 hover:scale-105" style="font-family: 'Times New Roman', serif;">
                    <i ></i> Save</button>
            </div>

        </form>

        @livewire('usuarios.perfil.cambiar-foto')
    </div>
</div>
<link rel="stylesheet" href="{{ asset('css/imagen.css') }}" type="text/css">

