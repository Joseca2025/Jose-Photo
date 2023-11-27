@extends('layouts.sidebar')

@section('title', 'Detalles')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

@section('content')

    <!-- Content -->
    <div class="mt-2">
        @livewire('fotografo.catalogo.ventas.chart-estatico', [$evento->id])
        <!-- Charts -->
        <div class="grid grid-cols-1 p-4 space-y-8 lg:gap-8 lg:space-y-0 lg:grid-cols-3">
            <!-- Bar chart card -->
            <div class="col-span-3 bg-white rounded-md dark:bg-darker" x-data="{ isOn: false }">
                <!-- Card header -->
                <div class="flex items-center justify-between p-4 border-b dark:border-primary">
                    <h4 class="text-lg font-semibold text-gray-500 dark:text-light">Bar Chart</h4>
                </div>

                @livewire('fotografo.catalogo.ventas.chart-lineas', [$evento->id])


            </div>

        </div>

    </div>


    {{-- <script src="{{ asset('js/chart.js') }}"></script> --}}




@endsection


@section('css')
    @livewireStyles
@stop

@section('js')
    @livewireScripts
@stop
