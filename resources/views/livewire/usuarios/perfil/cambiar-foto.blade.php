<div>
    <form action="{{ route('usuarios.cambiar-foto') }}" method="POST">
        @csrf
        <div class="container">
            @if ($imagenes->count())
                @foreach ($imagenes as $imagen)
                    @if ($imagen->ruta != null)
                        <label class="card">
                            <input type="checkbox" id="marcadas" name="marcadas[]" value="{{ $imagen->id }}">
                            <div class="card-content">
                                <img src="{{ $imagen->ruta }}" alt="" />
                                <div class="content">
                                    <button wire:click="descargar({{$imagen->id}})" type="button" class="block px-5 py-2 rounded-lg text-white bg-gradient-to-r from-green-400 to-blue-500 hover:bg-green-500">Descargar</button>
                                </div>
                            </div>
                        </label>
                    @endif
                @endforeach
            @else
                <div class="px-6 py-4">
                    <strong class="text-gray-500 "style="font-family: 'Times New Roman', serif;">No existe ningun registro coincidente</strong>
                </div>

            @endif
        </div>

        <button type="submit"
            class="ml-10 my-5 rounded-lg text-gray-400 py-3 px-8 bg-gradient-to-r from-red-400 
           to-red-700 hover:bg-gradient-to-br 
            focus:ring-4 ransition duration-500 
            hover:scale-105">Borrar</button>
    </form>
</div>
