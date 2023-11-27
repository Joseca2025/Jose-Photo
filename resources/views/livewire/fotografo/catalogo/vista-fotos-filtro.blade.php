<div class="p-4">
    <!-- Bar chart card -->
    <div class="bg-gray-200  dark:bg-darker">
        <!-- Card header -->
        <div class="flex items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">Catalogo de Imagenes</h4>
        </div>

        <div class="grid lg:grid-cols-4 sm:grid-cols-1 border-gray-500 dark:border-primary text-center">
            <button
                class="bg-gray-500 mx-7 border-gray-500  text-white  hover:scale-105" style="font-family: 'Times New Roman', serif;"
                wire:click="todas">Todas</button>
            <button
                class="bg-gray-500 mx-7 border-gray-500  text-white  hover:scale-105" style="font-family: 'Times New Roman', serif;"
                wire:click="publicas">Publicas</button>
            <button
                class="bg-gray-500 mx-7 border-gray-500  text-white  hover:scale-105" style="font-family: 'Times New Roman', serif;"
                wire:click="privadas">Privadas</button>
            <button
                class="bg-gray-500 mx-7 border-gray-500  text-white  hover:scale-105" style="font-family: 'Times New Roman', serif;"
                wire:click="qr">QR</button>

        </div>
        <!-- Chart -->
        <form action="{{ route('Fotografo.eliminar-fotos', $idevento) }}" method="POST">
            @csrf
            <div class="container">
                @if ($imagenes->count())
                    @foreach ($imagenes as $imagen)
                        <label class="card">
                            <input type="checkbox" id="marcadas" name="marcadas[]" value="{{ $imagen->id }}">
                            <div class="card-content">
                                <img src="{{ $imagen->ruta }}" alt="" />
                                <div class="content">
                                    <h4><strong>Precio:</strong></h4>
                                    <p>{{ $imagen->precio }}</p>
                                </div>
                            </div>
                        </label>
                    @endforeach
                @else
                    <div class="px-6 py-4">
                        <strong class="text-gray-500 "style="font-family: 'Times New Roman', serif;">No existe ningun registro coincidente</strong>
                    </div>

                @endif


            </div>
            <hr class="m-5 bg-black">
            <p class="px-5" style="font-family: 'Times New Roman', serif;">Selecciona las imagenes que decees eliminar:</p>
            <button type="submit"
                class="ml-10 my-5  text-white py-3 px-8 bg-black">Eliminar</button>
        </form>

    </div>
</div>
