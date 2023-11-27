@extends('layouts.sidebar')

@section('title', 'Escanear QR')

@section('content')


    <div class="flex flex-wrap justify-center mt-10">
        <div class="">
            <div class="bg-white" style="width:300px; height: 300px" id="reader"></div>
        </div>
        <div class="mt-10" style="padding:30px;">
            <h4 class="text-black dark:text-light"style="font-family: 'Times New Roman', serif;"><strong>Resultados del Scan</strong></h4>
            <div id="result"></div>
            <a id="link" target="_blank" href="" class="block ml-2 px-5 py-2  border-black rounded-lg text-white 
            bg-gray-600 transition-colors transition duration-500 hover:scale-105 mt-5"style="font-family: 'Times New Roman', serif;">Ir al link</a>
        </div>
    </div>

<script src="https://unpkg.com/html5-qrcode@2.0.9/dist/html5-qrcode.min.js"></script>

    <script>
        function onScanSuccess(qrCodeMessage) {
            document.getElementById('result').innerHTML = '<span class="result">' + qrCodeMessage + '</span>';
            document.getElementById('link').href = qrCodeMessage;
        }

        function onScanError(errorMessage) {
            //handle scan error
        }
        var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: 250
            });
        html5QrcodeScanner.render(onScanSuccess, onScanError);
    </script>


@endsection


@section('css')
    @livewireStyles
@stop

@section('js')

    @livewireScripts
@stop
