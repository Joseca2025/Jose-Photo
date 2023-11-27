<div class="m-2">
    <div class="bg-white  dark:bg-darker">
        <!-- Card header -->
        <div class="flex flex-wrap items-center justify-between p-4 border-b dark:border-primary">
            <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">
                <strong>Hola: </strong> {{ auth()->user()->name }}
            </h4>
            <h4 class="text-lg font-semibold text-black dark:text-light" style="font-family: 'Times New Roman', serif;">
                <strong>Evento: </strong> {{ $evento->nombre }}
            </h4>
        </div>

        <div class="p-2">
            <div class="container">
                @foreach ($listaCompras as $datoFoto)
                    <?php
                    $fotografia = DB::table('fotografias')
                        ->where('id', $datoFoto->idfotografia)
                        ->first();
                    ?>
                    <label class="card">
                        <div class="card-content">
                            <img src="{{ $fotografia->ruta }}" alt="" style="" />
                            <div class="content">
                                <button wire:click="descargar({{ $fotografia->id }})" type="button"
                                    class="block px-5 py-2 text-white bg-black">Descargar</button>

                            </div>
                        </div>
                    </label>
                @endforeach

            </div>
        </div>

    </div>
  
<style>
    .container {
    display: flex;
    flex-wrap: wrap;
    width: 100%;
    margin-left: 10px;
}

.card {
    position: relative;
    height: 300px;
    width: 340px;
    margin: 10px;
}

.card input {
    position: absolute;
    visibility: hidden;
    opacity: 0;
}

.card .card-content {
    position: relative;
    cursor: pointer;
    height: 100%;
    width: 100%;
    overflow: hidden;
  
    border: 3px solid #ffffff;
    box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.02);
}

.card img {
    position: relative;
    height: 100%;
    width: 400px;
    left: 50%;
    transform: translate(-50%, 0);
}

.content {
    position: absolute;
    bottom: 0;
    width: 100%;
    padding: 12px;
    background-color: #ffffff;
}

.download-button {
    display: block;
    margin-top: 10px;
}

</style>


</div>
