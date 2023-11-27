<div>
    <div class="pr-5 pt-5 pl-5 pb-1">
        <div class="bg-white  dark:bg-darker">
            <!-- Card header -->
            <div class="flex flex-wrap items-center justify-between p-4 border-b dark:border-primary">
                <h4 class="text-lg font-semibold text-black dark:text-light"style="font-family: Verdana, sans-serif;">Marca las foto que quieres comprar:
                    </h4>
            </div>

        </div>
    </div>

    <div class="container">
        @foreach ($fotografias as $fotografia)
            <?php
            $compra = DB::table('comprafotos')
                ->where('iduser', auth()->user()->id)
                ->where('idfotografia', $fotografia->id)
                ->first();
            ?>
            @if ($compra == null)
                <label class="card">
                    <input wire:model="marcadas" value="{{ $fotografia->id }}" type="checkbox">
                    <div class="card-content">
                        <img src="{{ $fotografia->ruta }}" alt="" style="filter: blur(1px)" />
                        <div class="content" style="font-family: 'Times New Roman', serif;">
                            <h4><strong>Precio:</strong></h4>
                            <p>{{ $fotografia->precio }} $us</p>
                        </div>
                    </div>
                </label>
            @else
                <label class="card">
                    <input wire:model="marcadas" value="{{ $fotografia->id }}" type="checkbox">
                    <div class="card-content">
                        <img src="{{ $fotografia->ruta }}" alt="" style="" />
                        <div class="content">
                            <h4><strong>Precio:</strong></h4>
                            <button wire:click="descargar({{$fotografia->id}})" type="button" class="block px-5 py-2 text-white bg-black hover:bg-gray-900" style="font-family: 'Times New Roman', serif;">Descargar</button>
                        
                        </div>
                    </div>
                </label>
            @endif
        @endforeach


    </div>

    <button wire:click="preguntar"
    class="ml-10 my-5 text-white py-3 px-8 bg-black hover:bg-gray-900 focus:ring-4 transition-colors duration-500 hover:scale-105" style="font-family: 'Times New Roman', serif;">Comprar</button>



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

    .card:active {
        transform: scale(0.96);
    }

    .card input:checked~.card-content {
        border-color: #1a1818;
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
        box-shadow: 0 4px 4px 0 rgba(32, 32, 32, 0.02);
    }

    .card img {
        position: relative;
        height: 100%;
        width: 400px;
        left: 50%;
        transform: translate(-50%, 0);
        transition: all ease 0.3s;
    }

    .card:hover img {
        width: 100%;
        height: 240px;

    }

    .card input:checked~.card-content img {
        filter: grayscale(0.4);
    }

    .content h4 {
        margin: 0 0 8px 0;
    }

    .content p {
        margin: 0;
        line-height: 1.5;
    }

    .content {
        position: absolute;
        bottom: -122px;
        width: 100%;
        padding: 12px;
        background-color: #ffffff;
        transition: all ease 0.3s;
    }

    .card:hover .content {
        bottom: 0;
    }

    .card input:checked~.card-content::before,
    .card input:checked~.card-content::after {
        content: '';
        position: absolute;
        z-index: 1;
    }

    .card-content::before {
        height: 20px;
        width: 20px;
        top: 10px;
        right: 10px;
        border: 1px solid #ffffff;
        border-radius: 50%;
        background-color: #161515;
    }

    .card-content::after {
        height: 4px;
        width: 8px;
        top: 16px;
        right: 16px;
        border: 1px solid #ffffff;
        border-width: 0 0 2px 2px;
        transform: rotate(-45deg);
    }
</style>
