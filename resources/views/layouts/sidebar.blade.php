<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Jose-Photo - @yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('icono/foto.jpg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.css') }}" />
    <script src="https://cdn.jsdelivr.net/gh/alpine-collective/alpine-magic-helpers@0.5.x/dist/component.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');
    setColors(color);" :class="{ 'dark': isDark }">
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Loading screen -->
            <div x-ref="loading"
                class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-gray-300">
                Cargando pagina
            </div>

            <!-- Sidebar -->
            <aside
                class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-primary-darker dark:bg-darker md:block">
                <div class="flex flex-col h-full">
                    <!-- Sidebar links -->
                    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Dashboards links -->


                        @can('fotografo.ver-paquetes-fotos')
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('Fotografo.mis-paquetes.index') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <span aria-hidden="true">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32"
                                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g transform="matrix(1,0,0,1,-240,-384)">
                                                <g transform="matrix(1.2,0,0,1,66.4,93)">
                                                    <path
                                                        d="M168,300.472C168,300.162 167.94,299.855 167.824,299.578C167.441,298.659 166.521,296.452 165.961,295.106C165.678,294.428 165.101,294 164.47,294C161.728,294 154.272,294 151.53,294C150.899,294 150.322,294.428 150.039,295.106C149.479,296.452 148.559,298.659 148.176,299.578C148.06,299.855 148,300.162 148,300.472C148,302.843 148,313.511 148,318C148,318.53 148.176,319.039 148.488,319.414C148.801,319.789 149.225,320 149.667,320C153.433,320 162.567,320 166.333,320C166.775,320 167.199,319.789 167.512,319.414C167.824,319.039 168,318.53 168,318C168,313.511 168,302.843 168,300.472Z"
                                                        style="fill:gray;"/>
                                                </g>
                                                <path
                                                    d="M263.764,386L248.236,386C247.1,386 246.061,386.642 245.553,387.658L243.317,392.13C243.108,392.547 243,393.006 243,393.472C243,395.843 243,406.511 243,411C243,411.796 243.316,412.559 243.879,413.121C244.441,413.684 245.204,414 246,414C250.52,414 261.48,414 266,414C266.796,414 267.559,413.684 268.121,413.121C268.684,412.559 269,411.796 269,411L269,393.472C269,393.006 268.892,392.547 268.683,392.131L266.447,387.658C265.939,386.642 264.9,386 263.764,386ZM267,394L260,394L260,397.955C260,398.719 259.565,399.416 258.879,399.752C258.193,400.088 257.375,400.003 256.772,399.534L256,398.934L255.228,399.534C254.625,400.003 253.807,400.088 253.121,399.752C252.435,399.416 252,398.719 252,397.955L252,394L245,394L245,411C245,411.265 245.105,411.52 245.293,411.707C245.48,411.895 245.735,412 246,412L266,412C266.265,412 266.52,411.895 266.707,411.707C266.895,411.52 267,411.265 267,411C267,411 267,394 267,394ZM249.886,407.998C248.283,407.938 247,406.618 247,405C247,403.344 248.344,402 250,402L251,402C251.552,402 252,402.448 252,403C252,403.552 251.552,404 251,404C251,404 250,404 250,404C249.448,404 249,404.448 249,405C249,405.552 249.448,406 250,406L250.888,406C251.44,406 251.888,406.448 251.888,407C251.888,407.535 251.468,407.972 250.94,407.999L249.888,408L249.886,407.998ZM260,407C260,407.552 260.448,408 261,408L262,408C263.656,408 265,406.656 265,405C265,403.344 263.656,402 262,402L261,402C260.448,402 260,402.448 260,403L260,407ZM256,402C254.344,402 253,403.344 253,405C253,406.656 254.344,408 256,408C257.656,408 259,406.656 259,405C259,403.344 257.656,402 256,402ZM262,406C262.552,406 263,405.552 263,405C263,404.448 262.552,404 262,404L262,406ZM256,404C256.552,404 257,404.448 257,405C257,405.552 256.552,406 256,406C255.448,406 255,405.552 255,405C255,404.448 255.448,404 256,404ZM258,394L258,397.955C257.29,397.403 256.614,396.877 256.614,396.877C256.253,396.596 255.747,396.596 255.386,396.877L254,397.955L254,394L258,394ZM252.82,388L252.153,392L245.618,392L247.342,388.553C247.511,388.214 247.857,388 248.236,388L252.82,388ZM254.18,392L254.847,388L257.153,388L257.82,392L254.18,392ZM259.18,388L263.764,388C264.143,388 264.489,388.214 264.658,388.553L266.382,392L259.847,392L259.18,388Z"
                                                    style="fill:black;" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;"> Tus Paquetes </span>
                                </a>
                            </div>
                        @endcan

                        @can('fotografo.ver-paquetes-fotos')
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('Fotografo.catalogos') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <svg width="32px" height="32px" viewBox="0 0 32 32"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g transform="matrix(1,0,0,1,-192,-337)">
                                            <g transform="matrix(1.6,0,0,1.6,-134.4,-210.8)">
                                                <path
                                                    d="M213.406,344.204C213.489,343.947 213.729,343.773 214,343.773C214.271,343.773 214.511,343.947 214.594,344.204C215.107,345.781 215.809,347.943 216.105,348.853C216.188,349.11 216.428,349.285 216.699,349.285C217.656,349.285 219.929,349.285 221.587,349.285C221.858,349.285 222.098,349.459 222.181,349.717C222.265,349.974 222.173,350.256 221.954,350.415C220.613,351.39 218.774,352.726 218,353.288C217.781,353.448 217.689,353.73 217.773,353.987C218.069,354.898 218.771,357.059 219.283,358.636C219.367,358.893 219.275,359.175 219.056,359.335C218.837,359.494 218.541,359.494 218.322,359.335C216.98,358.36 215.142,357.024 214.367,356.462C214.148,356.302 213.852,356.302 213.633,356.462C212.858,357.024 211.02,358.36 209.678,359.335C209.459,359.494 209.163,359.494 208.944,359.335C208.725,359.175 208.633,358.893 208.717,358.636C209.229,357.059 209.931,354.898 210.227,353.987C210.311,353.73 210.219,353.448 210,353.288C209.226,352.726 207.387,351.39 206.046,350.415C205.827,350.256 205.735,349.974 205.819,349.717C205.902,349.459 206.142,349.285 206.413,349.285C208.071,349.285 210.344,349.285 211.301,349.285C211.572,349.285 211.812,349.11 211.895,348.853C212.191,347.943 212.893,345.781 213.406,344.204Z"
                                                    style="fill:gray" />
                                            </g>
                                            <g transform="matrix(1.6,0,0,1.6,-134.4,-210.8)">
                                                <path
                                                    d="M211.301,348.66L206.413,348.66C205.871,348.66 205.392,349.009 205.224,349.524C205.057,350.039 205.24,350.603 205.678,350.921L209.633,353.794L208.122,358.443C207.955,358.958 208.138,359.522 208.576,359.84C209.014,360.158 209.608,360.158 210.046,359.84L214,356.967L217.954,359.84C218.392,360.158 218.986,360.158 219.424,359.84C219.862,359.522 220.045,358.958 219.878,358.443L218.367,353.794L222.322,350.921C222.76,350.603 222.943,350.039 222.776,349.524C222.608,349.009 222.129,348.66 221.587,348.66L216.699,348.66L215.189,344.011C215.021,343.496 214.542,343.148 214,343.148C213.458,343.148 212.979,343.496 212.811,344.011L211.301,348.66ZM214,344.398C214,344.398 215.51,349.046 215.51,349.046C215.678,349.561 216.158,349.91 216.699,349.91L221.587,349.91C221.587,349.91 217.633,352.783 217.633,352.783C217.195,353.101 217.011,353.665 217.179,354.18L218.689,358.829C218.689,358.829 214.735,355.956 214.735,355.956C214.297,355.638 213.703,355.638 213.265,355.956L209.311,358.829C209.311,358.829 210.821,354.18 210.821,354.18C210.989,353.665 210.805,353.101 210.367,352.783L206.413,349.91C206.413,349.91 211.301,349.91 211.301,349.91C211.842,349.91 212.322,349.561 212.49,349.046L214,344.398Z"
                                                    style="fill:black" />
                                            </g>
                                        </g>
                                    </svg>
                                    </span>
                                    <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;"> Tus Catalogos </span>
                                </a>
                            </div>
                        @endcan


                        @can('organizador.eventos')
                            <!-- Layouts links -->
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('organizador.misEventos.index') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <span aria-hidden="true">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g transform="matrix(1,0,0,1,-336,-288)">
                                            <g transform="matrix(1,0,0,0.736842,147,184.789)">
                                                <path
                                                    d="M216,155L202,155L202,171.286C202,172.785 202.895,174 204,174L214,174C215.105,174 216,172.785 216,171.286L216,155Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.28571,0,0,0.210526,87.3024,262.368)">
                                                <path
                                                    d="M216,159.75C216,158.49 215.918,157.282 215.772,156.391C215.626,155.5 215.428,155 215.222,155C212.772,155 205.228,155 202.778,155C202.572,155 202.374,155.5 202.228,156.391C202.082,157.282 202,158.49 202,159.75C202,162.651 202,166.349 202,169.25C202,170.51 202.082,171.718 202.228,172.609C202.374,173.5 202.572,174 202.778,174C205.228,174 212.772,174 215.222,174C215.428,174 215.626,173.5 215.772,172.609C215.918,171.718 216,170.51 216,169.25C216,166.349 216,162.651 216,159.75Z"
                                                    style="fill:#A1A1AA;stroke:#000000;" />
                                            </g>
                                            <g transform="matrix(1,0,0,1,192,144)">
                                                <path
                                                    d="M153,165C153,164.47 153.211,163.961 153.586,163.586C153.961,163.211 154.47,163 155,163L160,163C160.006,163 162,163.003 162,165C162,167 160,167 160,167L164.172,167C164.702,167 165.211,166.789 165.586,166.414C166.697,165.303 169,163 169,163C171.373,160.627 175.213,163.272 171.243,167.243C171.243,167.243 167.968,170.838 166.595,172.347C166.216,172.763 165.679,173 165.116,173C163.053,173 157.874,173 155,173C154.47,173 153.961,172.789 153.586,172.414C153.211,172.039 153,171.53 153,171C153,169.257 153,166.743 153,165Z"
                                                    style="fill:#A1A1AA;stroke:#000000;" />
                                            </g>
                                            <g transform="matrix(0.337543,-0.539958,-0.705915,-0.37641,393.21,461.803)">
                                                <path
                                                    d="M209.5,147C210.88,147 212,148.12 212,149.5C212,150.88 210.88,152 209.5,152C208.12,152 204.758,151.112 204.758,149.732C204.758,148.353 208.12,147 209.5,147Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g
                                                transform="matrix(-0.337543,-0.539958,0.705915,-0.37641,318.208,461.803)">
                                                <path
                                                    d="M209.5,147C210.88,147 212,148.12 212,149.5C212,150.88 210.88,152 209.5,152C208.12,152 204.758,151.112 204.758,149.732C204.758,148.353 208.12,147 209.5,147Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.5,0,0,1.2,118.5,109.2)">
                                                <path
                                                    d="M151,165.667C151,164.746 150.403,164 149.667,164C149.238,164 148.762,164 148.333,164C147.597,164 147,164.746 147,165.667C147,167.516 147,170.484 147,172.333C147,173.254 147.597,174 148.333,174C148.762,174 149.238,174 149.667,174C150.403,174 151,173.254 151,172.333C151,170.484 151,167.516 151,165.667Z"
                                                    style="fill:#A1A1AA;stroke:#000000;" />
                                            </g>
                                            <g transform="matrix(1,0,0,1,192,144)">
                                                <path
                                                    d="M153,165C153,164.47 153.211,163.961 153.586,163.586C153.961,163.211 154.47,163 155,163L160,163C160.006,163 162,163.003 162,165C162,167 160,167 160,167L164.172,167C164.702,167 165.211,166.789 165.586,166.414C166.697,165.303 169,163 169,163C171.373,160.627 175.213,163.272 171.243,167.243C171.243,167.243 167.968,170.838 166.595,172.347C166.216,172.763 165.679,173 165.116,173C163.053,173 157.874,173 155,173C154.47,173 153.961,172.789 153.586,172.414C153.211,172.039 153,171.53 153,171C153,169.257 153,166.743 153,165Z"
                                                    style="fill:#A1A1AA;stroke:#000000;" />
                                            </g>
                                            <!-- Gorro de fiesta -->
                                            <g transform="matrix(1,0,0,0.736842,147,184.789)">
                                                <path d="M209,152H215V154.5H209V152Z" style="fill:#F87171;"/>
                                                <path d="M209.5,152V150C209.5,150 208.5,149 211,149C213.5,149 212.5,150 212.5,150V152H209.5Z" style="fill:#FBBF24;"/>
                                            </g>
                                        </g>
                                    </svg>
                                    
                                    </span>
                                    <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;"> Tus Eventos </span>
                                </a>
                            </div>
                        @endcan

                        @can('fotografo.ver-catalogos')
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('Fotografo.mis-paquetes.index') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <span aria-hidden="true">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32"
                                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:serif="http://www.serif.com/"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g transform="matrix(1,0,0,1,-240,-384)">
                                                <g transform="matrix(1.2,0,0,1,66.4,93)">
                                                    <path
                                                        d="M168,300.472C168,300.162 167.94,299.855 167.824,299.578C167.441,298.659 166.521,296.452 165.961,295.106C165.678,294.428 165.101,294 164.47,294C161.728,294 154.272,294 151.53,294C150.899,294 150.322,294.428 150.039,295.106C149.479,296.452 148.559,298.659 148.176,299.578C148.06,299.855 148,300.162 148,300.472C148,302.843 148,313.511 148,318C148,318.53 148.176,319.039 148.488,319.414C148.801,319.789 149.225,320 149.667,320C153.433,320 162.567,320 166.333,320C166.775,320 167.199,319.789 167.512,319.414C167.824,319.039 168,318.53 168,318C168,313.511 168,302.843 168,300.472Z"
                                                        style="fill:rgb(144,224,239);" />
                                                </g>
                                                <path
                                                    d="M263.764,386L248.236,386C247.1,386 246.061,386.642 245.553,387.658L243.317,392.13C243.108,392.547 243,393.006 243,393.472C243,395.843 243,406.511 243,411C243,411.796 243.316,412.559 243.879,413.121C244.441,413.684 245.204,414 246,414C250.52,414 261.48,414 266,414C266.796,414 267.559,413.684 268.121,413.121C268.684,412.559 269,411.796 269,411L269,393.472C269,393.006 268.892,392.547 268.683,392.131L266.447,387.658C265.939,386.642 264.9,386 263.764,386ZM267,394L260,394L260,397.955C260,398.719 259.565,399.416 258.879,399.752C258.193,400.088 257.375,400.003 256.772,399.534L256,398.934L255.228,399.534C254.625,400.003 253.807,400.088 253.121,399.752C252.435,399.416 252,398.719 252,397.955L252,394L245,394L245,411C245,411.265 245.105,411.52 245.293,411.707C245.48,411.895 245.735,412 246,412L266,412C266.265,412 266.52,411.895 266.707,411.707C266.895,411.52 267,411.265 267,411C267,411 267,394 267,394ZM249.886,407.998C248.283,407.938 247,406.618 247,405C247,403.344 248.344,402 250,402L251,402C251.552,402 252,402.448 252,403C252,403.552 251.552,404 251,404C251,404 250,404 250,404C249.448,404 249,404.448 249,405C249,405.552 249.448,406 250,406L250.888,406C251.44,406 251.888,406.448 251.888,407C251.888,407.535 251.468,407.972 250.94,407.999L249.888,408L249.886,407.998ZM260,407C260,407.552 260.448,408 261,408L262,408C263.656,408 265,406.656 265,405C265,403.344 263.656,402 262,402L261,402C260.448,402 260,402.448 260,403L260,407ZM256,402C254.344,402 253,403.344 253,405C253,406.656 254.344,408 256,408C257.656,408 259,406.656 259,405C259,403.344 257.656,402 256,402ZM262,406C262.552,406 263,405.552 263,405C263,404.448 262.552,404 262,404L262,406ZM256,404C256.552,404 257,404.448 257,405C257,405.552 256.552,406 256,406C255.448,406 255,405.552 255,405C255,404.448 255.448,404 256,404ZM258,394L258,397.955C257.29,397.403 256.614,396.877 256.614,396.877C256.253,396.596 255.747,396.596 255.386,396.877L254,397.955L254,394L258,394ZM252.82,388L252.153,392L245.618,392L247.342,388.553C247.511,388.214 247.857,388 248.236,388L252.82,388ZM254.18,392L254.847,388L257.153,388L257.82,392L254.18,392ZM259.18,388L263.764,388C264.143,388 264.489,388.214 264.658,388.553L266.382,392L259.847,392L259.18,388Z"
                                                    style="fill:rgb(25,144,167);" />
                                            </g>
                                        </svg>
                                    </span>
                                    <span class="ml-2 text-sm"> Tus Paquetes </span>
                                </a>
                            </div>
                        @endcan


                        {{-- Globales --}}

                        <div x-data="{ isActive: false, open: false }">
                            <a href="{{ route('usuarios.catalogos') }}"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                role="button">
                                <img src="{{ asset('icono/revista.png') }}" alt="Icono" class="h-6 w-6">
                                <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;">Tus catalogos</span>
                            </a>
                        </div>
                        




                        <div x-data="{ isActive: false, open: false }">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href=" {{ route('usuarios.eventos-fotos-compradas') }}"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                role="button">
                                <img src="{{ asset('icono/carrito.png') }}" alt="Icono" class="h-6 w-6">
                                </span>
                                <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;"> Tus fotos compradas </span>
                            </a>
                        </div>

                        <div x-data="{ isActive: false, open: false }">
                            <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                            <a href="{{ route('usuarios.escanear-qr') }}"
                                class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                role="button">
                                <svg width="32px" height="32px" viewBox="0 0 32 32"
                                    style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                    version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g transform="matrix(1,0,0,1,-192,0)">
                                        <g transform="matrix(1.1,0,0,1.1,-19.5,-0.3)">
                                            <path
                                                d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                style="fill:#718096; stroke:#000000; stroke-width:1;" />
                                        </g>
                                        
                                        <g transform="matrix(1.1,0,0,1.1,-4.5,-0.3)">
                                            <path
                                                d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                style="fill:#718096; stroke:#000000; stroke-width:1;" />
                                        </g>
                                        
                                        <g transform="matrix(1.1,0,0,1.1,-19.5,14.7)">
                                            <path
                                                d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                style="fill:gray; stroke:black;" />
                                        </g>
                                        
                                        <path
                                        d="M207,20C207,19.204 206.684,18.441 206.121,17.879C205.559,17.316 204.796,17 204,17C202.014,17 198.986,17 197,17C196.204,17 195.441,17.316 194.879,17.879C194.316,18.441 194,19.204 194,20C194,21.986 194,25.014 194,27C194,27.796 194.316,28.559 194.879,29.121C195.441,29.684 196.204,30 197,30C198.986,30 202.014,30 204,30C204.796,30 205.559,29.684 206.121,29.121C206.684,28.559 207,27.796 207,27L207,20ZM219,29L219,28C219,28 221,28 221,28C221.552,28 222,27.552 222,27C222,26.448 221.552,26 221,26L218,26C217.448,26 217,26.448 217,27L217,29C217,29.552 217.448,30 218,30C218.552,30 219,29.552 219,29ZM210,27L210,29C210,29.552 210.448,30 211,30L215,30C215.552,30 216,29.552 216,29L216,27C216,26.448 215.552,26 215,26C214.448,26 214,26.448 214,27L214,28L212,28C212,28 212,27 212,27C212,26.448 211.552,26 211,26C210.448,26 210,26.448 210,27ZM205,20L205,27C205,27.265 204.895,27.52 204.707,27.707C204.52,27.895 204.265,28 204,28L197,28C196.735,28 196.48,27.895 196.293,27.707C196.105,27.52 196,27.265 196,27L196,20C196,19.735 196.105,19.48 196.293,19.293C196.48,19.105 196.735,19 197,19L204,19C204.265,19 204.52,19.105 204.707,19.293C204.895,19.48 205,19.735 205,20ZM204,22C204,21.47 203.789,20.961 203.414,20.586C203.039,20.211 202.53,20 202,20C201.129,20 199.871,20 199,20C198.47,20 197.961,20.211 197.586,20.586C197.211,20.961 197,21.47 197,22C197,22.871 197,24.129 197,25C197,25.53 197.211,26.039 197.586,26.414C197.961,26.789 198.47,27 199,27C199.871,27 201.129,27 202,27C202.53,27 203.039,26.789 203.414,26.414C203.789,26.039 204,25.53 204,25L204,22ZM202,22L202,25L199,25L199,22L202,22ZM212,24L212,22C212,21.448 211.552,21 211,21C210.448,21 210,21.448 210,22L210,24C210,24.552 210.448,25 211,25C211.552,25 212,24.552 212,24ZM215,24L215,23C215,23 216,23 216,23C216.552,23 217,22.552 217,22C217,21.448 216.552,21 216,21L214,21C213.448,21 213,21.448 213,22L213,24C213,24.552 213.448,25 214,25C214.552,25 215,24.552 215,24ZM218,25L221,25C221.552,25 222,24.552 222,24L222,22C222,21.448 221.552,21 221,21C220.448,21 220,21.448 220,22L220,23C220,23 218,23 218,23C217.448,23 217,23.448 217,24C217,24.552 217.448,25 218,25ZM221,18L211,18C210.448,18 210,18.448 210,19C210,19.552 210.448,20 211,20L221,20C221.552,20 222,19.552 222,19C222,18.448 221.552,18 221,18ZM207,5C207,4.204 206.684,3.441 206.121,2.879C205.559,2.316 204.796,2 204,2C202.014,2 198.986,2 197,2C196.204,2 195.441,2.316 194.879,2.879C194.316,3.441 194,4.204 194,5C194,6.986 194,10.014 194,12C194,12.796 194.316,13.559 194.879,14.121C195.441,14.684 196.204,15 197,15C198.986,15 202.014,15 204,15C204.796,15 205.559,14.684 206.121,14.121C206.684,13.559 207,12.796 207,12L207,5ZM222,5C222,4.204 221.684,3.441 221.121,2.879C220.559,2.316 219.796,2 219,2C217.014,2 213.986,2 212,2C211.204,2 210.441,2.316 209.879,2.879C209.316,3.441 209,4.204 209,5C209,6.986 209,10.014 209,12C209,12.796 209.316,13.559 209.879,14.121C210.441,14.684 211.204,15 212,15C213.986,15 217.014,15 219,15C219.796,15 220.559,14.684 221.121,14.121C221.684,13.559 222,12.796 222,12L222,5ZM205,5L205,12C205,12.265 204.895,12.52 204.707,12.707C204.52,12.895 204.265,13 204,13L197,13C196.735,13 196.48,12.895 196.293,12.707C196.105,12.52 196,12.265 196,12L196,5C196,4.735 196.105,4.48 196.293,4.293C196.48,4.105 196.735,4 197,4L204,4C204.265,4 204.52,4.105 204.707,4.293C204.895,4.48 205,4.735 205,5ZM220,5L220,12C220,12.265 219.895,12.52 219.707,12.707C219.52,12.895 219.265,13 219,13L212,13C211.735,13 211.48,12.895 211.293,12.707C211.105,12.52 211,12.265 211,12L211,5C211,4.735 211.105,4.48 211.293,4.293C211.48,4.105 211.735,4 212,4L219,4C219.265,4 219.52,4.105 219.707,4.293C219.895,4.48 220,4.735 220,5ZM204,7C204,6.47 203.789,5.961 203.414,5.586C203.039,5.211 202.53,5 202,5C201.129,5 199.871,5 199,5C198.47,5 197.961,5.211 197.586,5.586C197.211,5.961 197,6.47 197,7C197,7.871 197,9.129 197,10C197,10.53 197.211,11.039 197.586,11.414C197.961,11.789 198.47,12 199,12C199.871,12 201.129,12 202,12C202.53,12 203.039,11.789 203.414,11.414C203.789,11.039 204,10.53 204,10L204,7ZM219,7C219,6.47 218.789,5.961 218.414,5.586C218.039,5.211 217.53,5 217,5C216.129,5 214.871,5 214,5C213.47,5 212.961,5.211 212.586,5.586C212.211,5.961 212,6.47 212,7C212,7.871 212,9.129 212,10C212,10.53 212.211,11.039 212.586,11.414C212.961,11.789 213.47,12 214,12C214.871,12 216.129,12 217,12C217.53,12 218.039,11.789 218.414,11.414C218.789,11.039 219,10.53 219,10L219,7ZM202,7L202,10L199,10L199,7L202,7ZM217,7L217,10L214,10L214,7L217,7Z"
                                        style="fill:black;" />
                                    
                                    </g>
                                </svg>
                                </span>
                                <span class="ml-2 text-sm"style="font-family: 'Times New Roman', serif;"> Escanear QR </span>
                            </a>
                        </div>
                    </nav>

                    <!-- Sidebar footer -->
                    <div class="flex-shrink-0 px-2 py-4 space-y-2">
                        <button @click="openSettingsPanel" type="button"
                            class="flex items-center justify-center w-full px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary-dark focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">
                            <span aria-hidden="true">
                                <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                                </svg>
                            </span>
                            <span>Customize</span>
                        </button>
                    </div>
                </div>
            </aside>

            <div
                class="flex flex-col flex-1 min-h-screen overflow-x-hidden overflow-y-auto bg-gradient-to-r from-gray-300 to-gray-200">
                <!-- Navbar -->
                <header class="relative flex-shrink-0 bg-white dark:bg-darker">
                    <div class="flex items-center justify-between p-2 border-b dark:border-primary-darker">
                        <!-- Mobile menu button -->
                        <button @click="isMobileMainMenuOpen = !isMobileMainMenuOpen"
                            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                            <span class="sr-only">Open main manu</span>
                            <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </span>
                        </button>

                        <!-- Brand -->
                        <div class="flex flex-wrap">
                          

                             
                        </div>

                        <!-- Mobile sub menu button -->
                        <button @click="isMobileSubMenuOpen = !isMobileSubMenuOpen"
                            class="p-1 transition-colors duration-200 rounded-md text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark md:hidden focus:outline-none focus:ring">
                            <span class="sr-only">Open sub manu</span>
                            <span aria-hidden="true">
                                <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                </svg>
                            </span>
                        </button>

                        <!-- Desktop Right buttons -->
                        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">
                            <!-- Toggle dark theme button -->
                            

                            <!-- Notification button -->
                            <button @click="openNotificationsPanel"
                                class="p-2 transition-colors duration-200  text-primary-lighter bg-gray-400 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                <span class="sr-only">Open Notification panel</span>
                                <svg class="w-7 h-7 text-gray-500 border border-black  p-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke="black" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                                
                            </button>

                            <!-- Search button -->
                     

                            <!-- Settings button -->


                            <!-- User avatar button -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                                    <span class="sr-only">User menu</span>
                                    <?php
                                    $imagen1 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 1)
                                        ->first();
                                    
                                    $imagen2 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 2)
                                        ->first();
                                    
                                    $imagen3 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 3)
                                        ->first();
                                    ?>
                                    @if ($imagen1->ruta == null)
                                        @if ($imagen2->ruta == null)
                                            @if ($imagen3->ruta == null)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyz-77X11MoGE22xVjjPhbpW6lPj6I0SkcTQ&usqp=CAU"
                                                    alt="" />
                                            @else
                                                <img class="w-10 h-10 rounded-full" src="{{ $imagen3->ruta }}"
                                                    alt="" />
                                            @endif
                                        @else
                                            <img class="w-10 h-10 rounded-full" src="{{ $imagen2->ruta }}"
                                                alt="" />

                                        @endif
                                    @else
                                        <img class="w-10 h-10 rounded-full" src="{{ $imagen1->ruta }}"
                                            alt="" />
                                    @endif
                                </button>

                                <!-- User dropdown menu -->
                                <div x-show="open" x-ref="userMenu"
                                    x-transition:enter="transition-all transform ease-out"
                                    x-transition:enter-start="translate-y-1/2 opacity-0"
                                    x-transition:enter-end="translate-y-0 opacity-100"
                                    x-transition:leave="transition-all transform ease-in"
                                    x-transition:leave-start="translate-y-0 opacity-100"
                                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                                    tabindex="-1" role="menu" aria-orientation="vertical"
                                    aria-label="User menu">
                                    <a href="{{ route('usuarios.perfil') }}" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Perfil
                                    </a>
                                    <a href="#" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Tarjeta de Credito
                                    </a>
                                    <a href="{{ route('logout') }}" role="menuitem"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Cerrar Sesion
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </nav>

                        <!-- Mobile sub menu -->
                        <nav x-transition:enter="transition duration-200 ease-in-out transform sm:duration-500"
                            x-transition:enter-start="-translate-y-full opacity-0"
                            x-transition:enter-end="translate-y-0 opacity-100"
                            x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                            x-transition:leave-start="translate-y-0 opacity-100"
                            x-transition:leave-end="-translate-y-full opacity-0" x-show="isMobileSubMenuOpen"
                            @click.away="isMobileSubMenuOpen = false"
                            class="absolute flex items-center p-4 bg-white rounded-md shadow-lg dark:bg-darker top-16 inset-x-4 md:hidden"
                            aria-label="Secondary">
                            <div class="space-x-2">
                                <!-- Toggle dark theme button -->
                                <button aria-hidden="true" class="relative focus:outline-none" x-cloak
                                    @click="toggleTheme">
                                    <div
                                        class="w-12 h-6 transition rounded-full outline-none bg-primary-100 dark:bg-primary-lighter">
                                    </div>
                                    <div class="absolute top-0 left-0 inline-flex items-center justify-center w-6 h-6 transition-all duration-200 transform scale-110 rounded-full shadow-sm"
                                        :class="{
                                            'translate-x-0 -translate-y-px  bg-white text-primary-dark': !
                                                isDark,
                                            'translate-x-6 text-primary-100 bg-primary-darker': isDark
                                        }">
                                        <svg x-show="!isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                        </svg>
                                        <svg x-show="isDark" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    </div>
                                </button>

                                <!-- Notification button -->
                                <button
                                    @click="openNotificationsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                    <span class="sr-only">Open notifications panel</span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                    </svg>
                                </button>

                                <!-- Search button -->
                                <button
                                    @click="openSearchPanel(); $nextTick(() => { $refs.searchInput.focus(); setTimeout(() => {isMobileSubMenuOpen= false}, 100) })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                    <span class="sr-only">Open search panel</span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </button>

                                <!-- Settings button -->
                                <button @click="openSettingsPanel(); $nextTick(() => { isMobileSubMenuOpen = false })"
                                    class="p-2 transition-colors duration-200 rounded-full text-primary-lighter bg-primary-50 hover:text-primary hover:bg-primary-100 dark:hover:text-light dark:hover:bg-primary-dark dark:bg-dark focus:outline-none focus:bg-primary-100 dark:focus:bg-primary-dark focus:ring-primary-darker">
                                    <span class="sr-only">Open settings panel</span>
                                    <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </button>
                            </div>

                            <!-- User avatar button -->
                            <div class="relative ml-auto" x-data="{ open: false }">
                                <button @click="open = !open" type="button" aria-haspopup="true"
                                    :aria-expanded="open ? 'true' : 'false'"
                                    class="block transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                                    <span class="sr-only">User menu</span>
                                    <?php
                                    $imagen1 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 1)
                                        ->first();
                                    
                                    $imagen2 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 2)
                                        ->first();
                                    
                                    $imagen3 = DB::table('foto_perfils')
                                        ->where('iduser', auth()->user()->id)
                                        ->where('posicion', 3)
                                        ->first();
                                    ?>
                                    @if ($imagen1->ruta == null)
                                        @if ($imagen2->ruta == null)
                                            @if ($imagen3->ruta == null)
                                                <img class="w-10 h-10 rounded-full"
                                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyz-77X11MoGE22xVjjPhbpW6lPj6I0SkcTQ&usqp=CAU"
                                                    alt="" />
                                            @else
                                                <img class="w-10 h-10 rounded-full" src="{{ $imagen3->ruta }}"
                                                    alt="" />
                                            @endif
                                        @else
                                            <img class="w-10 h-10 rounded-full" src="{{ $imagen2->ruta }}"
                                                alt="" />

                                        @endif
                                    @else
                                        <img class="w-10 h-10 rounded-full" src="{{ $imagen1->ruta }}"
                                            alt="" />
                                    @endif
                                </button>

                                <!-- User dropdown menu -->
                                <div x-show="open" x-transition:enter="transition-all transform ease-out"
                                    x-transition:enter-start="translate-y-1/2 opacity-0"
                                    x-transition:enter-end="translate-y-0 opacity-100"
                                    x-transition:leave="transition-all transform ease-in"
                                    x-transition:leave-start="translate-y-0 opacity-100"
                                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                                    class="absolute right-0 w-48 py-1 origin-top-right bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark"
                                    role="menu" aria-orientation="vertical" aria-label="User menu">
                                    <a href="#" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Your Profile
                                    </a>
                                    <a href="#" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Settings
                                    </a>
                                    <a href="#" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-primary">
                                        Logout
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>
                    <!-- Mobile main manu -->
                    <div class="border-b md:hidden dark:border-primary-darker" x-show="isMobileMainMenuOpen"
                        @click.away="isMobileMainMenuOpen = false">
                        <nav aria-label="Main" class="px-2 py-4 space-y-2">


                            @can('organizador.eventos')
                                <!-- Layouts links -->
                                <div x-data="{ isActive: false, open: false }">
                                    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                    <a href="{{ route('organizador.misEventos.index') }}"
                                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                        role="button">
                                        <span aria-hidden="true">
                                            <svg width="32px" height="32px" viewBox="0 0 32 32"
                                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                                version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:serif="http://www.serif.com/"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g transform="matrix(1,0,0,1,-336,-288)">
                                                    <g transform="matrix(1,0,0,0.736842,147,184.789)">
                                                        <path
                                                            d="M216,155L202,155L202,171.286C202,172.785 202.895,174 204,174L214,174C215.105,174 216,172.785 216,171.286L216,155Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <g transform="matrix(1.28571,0,0,0.210526,87.3024,262.368)">
                                                        <path
                                                            d="M216,159.75C216,158.49 215.918,157.282 215.772,156.391C215.626,155.5 215.428,155 215.222,155C212.772,155 205.228,155 202.778,155C202.572,155 202.374,155.5 202.228,156.391C202.082,157.282 202,158.49 202,159.75C202,162.651 202,166.349 202,169.25C202,170.51 202.082,171.718 202.228,172.609C202.374,173.5 202.572,174 202.778,174C205.228,174 212.772,174 215.222,174C215.428,174 215.626,173.5 215.772,172.609C215.918,171.718 216,170.51 216,169.25C216,166.349 216,162.651 216,159.75Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <g
                                                        transform="matrix(0.337543,-0.539958,-0.705915,-0.37641,393.21,461.803)">
                                                        <path
                                                            d="M209.5,147C210.88,147 212,148.12 212,149.5C212,150.88 210.88,152 209.5,152C208.12,152 204.758,151.112 204.758,149.732C204.758,148.353 208.12,147 209.5,147Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <g
                                                        transform="matrix(-0.337543,-0.539958,0.705915,-0.37641,318.208,461.803)">
                                                        <path
                                                            d="M209.5,147C210.88,147 212,148.12 212,149.5C212,150.88 210.88,152 209.5,152C208.12,152 204.758,151.112 204.758,149.732C204.758,148.353 208.12,147 209.5,147Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <g transform="matrix(1.5,0,0,1.2,118.5,109.2)">
                                                        <path
                                                            d="M151,165.667C151,164.746 150.403,164 149.667,164C149.238,164 148.762,164 148.333,164C147.597,164 147,164.746 147,165.667C147,167.516 147,170.484 147,172.333C147,173.254 147.597,174 148.333,174C148.762,174 149.238,174 149.667,174C150.403,174 151,173.254 151,172.333C151,170.484 151,167.516 151,165.667Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <g transform="matrix(1,0,0,1,192,144)">
                                                        <path
                                                            d="M153,165C153,164.47 153.211,163.961 153.586,163.586C153.961,163.211 154.47,163 155,163L160,163C160.006,163 162,163.003 162,165C162,167 160,167 160,167L164.172,167C164.702,167 165.211,166.789 165.586,166.414C166.697,165.303 169,163 169,163C171.373,160.627 175.213,163.272 171.243,167.243C171.243,167.243 167.968,170.838 166.595,172.347C166.216,172.763 165.679,173 165.116,173C163.053,173 157.874,173 155,173C154.47,173 153.961,172.789 153.586,172.414C153.211,172.039 153,171.53 153,171C153,169.257 153,166.743 153,165Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <path
                                                        d="M345.529,306.385C345.974,306.135 346.48,306 347,306L348,306L348,300C347.476,299.996 346.974,299.785 346.602,299.414C346.227,299.039 346.017,298.53 346.017,298L346.017,296C346.017,295.47 346.227,294.961 346.602,294.586C346.978,294.211 347.486,294 348.017,294L350.497,294C350.466,293.959 350.439,293.919 350.414,293.88C349.674,292.696 350.165,291.002 351.713,290.177C353.188,289.39 354.934,289.809 355.64,290.938C355.663,290.975 355.686,291.014 355.709,291.057C355.732,291.014 355.756,290.975 355.779,290.938C356.484,289.809 358.23,289.39 359.706,290.177C361.254,291.002 361.744,292.696 361.004,293.88C360.98,293.919 360.952,293.959 360.922,294L364.017,294C364.547,294 365.056,294.211 365.431,294.586C365.806,294.961 366.017,295.47 366.017,296L366.017,298C366.017,298.53 365.806,299.039 365.431,299.414C365.056,299.789 364.547,300 364.017,300L364,300L364,305.259C364.834,305.544 365.507,306.175 365.798,307.027C366.193,308.182 365.934,309.956 363.967,311.932C363.967,311.932 359.334,317.02 359.334,317.02C358.766,317.644 357.961,318 357.116,318C355.053,318 349.874,318 347,318C346.48,318 345.974,317.865 345.529,317.615C344.996,318.448 344.062,319 343,319L341,319C339.343,319 338,317.657 338,316L338,308C338,306.343 339.343,305 341,305L343,305C344.062,305 344.996,305.552 345.529,306.385ZM344,308L344,316C344,316.552 343.552,317 343,317C343,317 341,317 341,317C340.448,317 340,316.552 340,316C340,316 340,308 340,308C340,307.448 340.448,307 341,307C341,307 343,307 343,307C343.552,307 344,307.448 344,308ZM346,309L346,315C346,315.265 346.105,315.52 346.293,315.707C346.48,315.895 346.735,316 347,316L357.116,316C357.398,316 357.666,315.881 357.856,315.673C359.229,314.165 362.503,310.569 362.519,310.552L362.536,310.536C363.732,309.339 364.145,308.373 363.906,307.674C363.635,306.883 362.517,306.898 361.707,307.707C361.707,307.707 359.404,310.01 358.293,311.121C357.73,311.684 356.967,312 356.172,312L349,312C348.448,312 348,311.552 348,311C348,310.448 348.448,310 349,310L352,310C352,310 353,310 353,309C353,308.001 352.002,308 352,308L347,308C346.735,308 346.48,308.105 346.293,308.293C346.105,308.48 346,308.735 346,309ZM355,300L355,310L356.172,310C356.437,310 356.691,309.895 356.879,309.707L357,309.586L357,300L355,300ZM359,307.586L360.293,306.293C360.829,305.757 361.415,305.415 362,305.239L362,300L359,300L359,307.586ZM350,306L352.001,306C352.004,306 352.452,306.001 353,306.174L353,300L350,300L350,306ZM353,296L353,298L348.017,298C348.017,298 348.017,296 348.017,296L353,296ZM357,298L355,298L355,296L357,296L357,298ZM359,296L364.017,296C364.017,296 364.017,298 364.017,298L359,298L359,296ZM357.255,294L357.132,294C357.114,293.927 357.074,293.76 357.071,293.646C357.057,293.047 357.266,292.332 357.475,291.998C357.559,291.862 357.723,291.804 357.895,291.777C358.17,291.734 358.481,291.79 358.765,291.941C359.023,292.079 359.219,292.273 359.308,292.493C359.352,292.603 359.37,292.721 359.308,292.82C359.1,293.153 358.43,293.6 357.791,293.851C357.632,293.913 357.473,293.962 357.322,293.986C357.299,293.99 357.277,293.995 357.255,294ZM354.286,294L354.163,294C354.142,293.995 354.119,293.99 354.096,293.986C353.945,293.962 353.787,293.913 353.628,293.851C352.989,293.6 352.319,293.153 352.11,292.82C352.049,292.721 352.067,292.603 352.111,292.493C352.199,292.273 352.395,292.079 352.654,291.941C352.937,291.79 353.248,291.734 353.523,291.777C353.695,291.804 353.859,291.862 353.944,291.998C354.153,292.332 354.362,293.047 354.347,293.646C354.344,293.76 354.305,293.927 354.286,294Z"
                                                        style="fill:rgb(25,144,167);" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="ml-2 text-sm"> Tus Eventos </span>
                                    </a>
                                </div>
                            @endcan

                            @can('fotografo.ver-paquetes-fotos')
                                <div x-data="{ isActive: false, open: false }">
                                    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                    <a href="{{ route('Fotografo.mis-paquetes.index') }}"
                                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                        role="button">
                                        <span aria-hidden="true">
                                            <svg width="32px" height="32px" viewBox="0 0 32 32"
                                                style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                                version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                                xmlns:serif="http://www.serif.com/"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <g transform="matrix(1,0,0,1,-240,-384)">
                                                    <g transform="matrix(1.2,0,0,1,66.4,93)">
                                                        <path
                                                            d="M168,300.472C168,300.162 167.94,299.855 167.824,299.578C167.441,298.659 166.521,296.452 165.961,295.106C165.678,294.428 165.101,294 164.47,294C161.728,294 154.272,294 151.53,294C150.899,294 150.322,294.428 150.039,295.106C149.479,296.452 148.559,298.659 148.176,299.578C148.06,299.855 148,300.162 148,300.472C148,302.843 148,313.511 148,318C148,318.53 148.176,319.039 148.488,319.414C148.801,319.789 149.225,320 149.667,320C153.433,320 162.567,320 166.333,320C166.775,320 167.199,319.789 167.512,319.414C167.824,319.039 168,318.53 168,318C168,313.511 168,302.843 168,300.472Z"
                                                            style="fill:rgb(144,224,239);" />
                                                    </g>
                                                    <path
                                                        d="M263.764,386L248.236,386C247.1,386 246.061,386.642 245.553,387.658L243.317,392.13C243.108,392.547 243,393.006 243,393.472C243,395.843 243,406.511 243,411C243,411.796 243.316,412.559 243.879,413.121C244.441,413.684 245.204,414 246,414C250.52,414 261.48,414 266,414C266.796,414 267.559,413.684 268.121,413.121C268.684,412.559 269,411.796 269,411L269,393.472C269,393.006 268.892,392.547 268.683,392.131L266.447,387.658C265.939,386.642 264.9,386 263.764,386ZM267,394L260,394L260,397.955C260,398.719 259.565,399.416 258.879,399.752C258.193,400.088 257.375,400.003 256.772,399.534L256,398.934L255.228,399.534C254.625,400.003 253.807,400.088 253.121,399.752C252.435,399.416 252,398.719 252,397.955L252,394L245,394L245,411C245,411.265 245.105,411.52 245.293,411.707C245.48,411.895 245.735,412 246,412L266,412C266.265,412 266.52,411.895 266.707,411.707C266.895,411.52 267,411.265 267,411C267,411 267,394 267,394ZM249.886,407.998C248.283,407.938 247,406.618 247,405C247,403.344 248.344,402 250,402L251,402C251.552,402 252,402.448 252,403C252,403.552 251.552,404 251,404C251,404 250,404 250,404C249.448,404 249,404.448 249,405C249,405.552 249.448,406 250,406L250.888,406C251.44,406 251.888,406.448 251.888,407C251.888,407.535 251.468,407.972 250.94,407.999L249.888,408L249.886,407.998ZM260,407C260,407.552 260.448,408 261,408L262,408C263.656,408 265,406.656 265,405C265,403.344 263.656,402 262,402L261,402C260.448,402 260,402.448 260,403L260,407ZM256,402C254.344,402 253,403.344 253,405C253,406.656 254.344,408 256,408C257.656,408 259,406.656 259,405C259,403.344 257.656,402 256,402ZM262,406C262.552,406 263,405.552 263,405C263,404.448 262.552,404 262,404L262,406ZM256,404C256.552,404 257,404.448 257,405C257,405.552 256.552,406 256,406C255.448,406 255,405.552 255,405C255,404.448 255.448,404 256,404ZM258,394L258,397.955C257.29,397.403 256.614,396.877 256.614,396.877C256.253,396.596 255.747,396.596 255.386,396.877L254,397.955L254,394L258,394ZM252.82,388L252.153,392L245.618,392L247.342,388.553C247.511,388.214 247.857,388 248.236,388L252.82,388ZM254.18,392L254.847,388L257.153,388L257.82,392L254.18,392ZM259.18,388L263.764,388C264.143,388 264.489,388.214 264.658,388.553L266.382,392L259.847,392L259.18,388Z"
                                                        style="fill:rgb(25,144,167);" />
                                                </g>
                                            </svg>
                                        </span>
                                        <span class="ml-2 text-sm"> Tus Paquetes </span>
                                    </a>
                                </div>
                            @endcan

                            @can('fotografo.ver-paquetes-fotos')
                                <div x-data="{ isActive: false, open: false }">
                                    <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                    <a href="{{ route('Fotografo.catalogos') }}"
                                        class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                        role="button">
                                        <svg width="32px" height="32px" viewBox="0 0 32 32"
                                            style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                            version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:serif="http://www.serif.com/"
                                            xmlns:xlink="http://www.w3.org/1999/xlink">
                                            <g transform="matrix(1,0,0,1,-192,-337)">
                                                <g transform="matrix(1.6,0,0,1.6,-134.4,-210.8)">
                                                    <path
                                                        d="M213.406,344.204C213.489,343.947 213.729,343.773 214,343.773C214.271,343.773 214.511,343.947 214.594,344.204C215.107,345.781 215.809,347.943 216.105,348.853C216.188,349.11 216.428,349.285 216.699,349.285C217.656,349.285 219.929,349.285 221.587,349.285C221.858,349.285 222.098,349.459 222.181,349.717C222.265,349.974 222.173,350.256 221.954,350.415C220.613,351.39 218.774,352.726 218,353.288C217.781,353.448 217.689,353.73 217.773,353.987C218.069,354.898 218.771,357.059 219.283,358.636C219.367,358.893 219.275,359.175 219.056,359.335C218.837,359.494 218.541,359.494 218.322,359.335C216.98,358.36 215.142,357.024 214.367,356.462C214.148,356.302 213.852,356.302 213.633,356.462C212.858,357.024 211.02,358.36 209.678,359.335C209.459,359.494 209.163,359.494 208.944,359.335C208.725,359.175 208.633,358.893 208.717,358.636C209.229,357.059 209.931,354.898 210.227,353.987C210.311,353.73 210.219,353.448 210,353.288C209.226,352.726 207.387,351.39 206.046,350.415C205.827,350.256 205.735,349.974 205.819,349.717C205.902,349.459 206.142,349.285 206.413,349.285C208.071,349.285 210.344,349.285 211.301,349.285C211.572,349.285 211.812,349.11 211.895,348.853C212.191,347.943 212.893,345.781 213.406,344.204Z"
                                                        style="fill:rgb(144,224,239);" />
                                                </g>
                                                <g transform="matrix(1.6,0,0,1.6,-134.4,-210.8)">
                                                    <path
                                                        d="M211.301,348.66L206.413,348.66C205.871,348.66 205.392,349.009 205.224,349.524C205.057,350.039 205.24,350.603 205.678,350.921L209.633,353.794L208.122,358.443C207.955,358.958 208.138,359.522 208.576,359.84C209.014,360.158 209.608,360.158 210.046,359.84L214,356.967L217.954,359.84C218.392,360.158 218.986,360.158 219.424,359.84C219.862,359.522 220.045,358.958 219.878,358.443L218.367,353.794L222.322,350.921C222.76,350.603 222.943,350.039 222.776,349.524C222.608,349.009 222.129,348.66 221.587,348.66L216.699,348.66L215.189,344.011C215.021,343.496 214.542,343.148 214,343.148C213.458,343.148 212.979,343.496 212.811,344.011L211.301,348.66ZM214,344.398C214,344.398 215.51,349.046 215.51,349.046C215.678,349.561 216.158,349.91 216.699,349.91L221.587,349.91C221.587,349.91 217.633,352.783 217.633,352.783C217.195,353.101 217.011,353.665 217.179,354.18L218.689,358.829C218.689,358.829 214.735,355.956 214.735,355.956C214.297,355.638 213.703,355.638 213.265,355.956L209.311,358.829C209.311,358.829 210.821,354.18 210.821,354.18C210.989,353.665 210.805,353.101 210.367,352.783L206.413,349.91C206.413,349.91 211.301,349.91 211.301,349.91C211.842,349.91 212.322,349.561 212.49,349.046L214,344.398Z"
                                                        style="fill:rgb(25,144,167);" />
                                                </g>
                                            </g>
                                        </svg>
                                        </span>
                                        <span class="ml-2 text-sm"> Tus Catalogos </span>
                                    </a>
                                </div>
                            @endcan

                            {{-- Globales --}}


                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href=" {{ route('usuarios.eventos-fotos-compradas') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <svg width="32px" height="32px" viewBox="0 0 32 32"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g transform="matrix(1,0,0,1,-433,-288)">
                                            <g transform="matrix(1.33333,0,0,1.33333,424.333,277)">
                                                <circle cx="15.5" cy="28.5" r="1.5"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.33333,0,0,1.33333,434.333,277)">
                                                <circle cx="15.5" cy="28.5" r="1.5"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(0.69088,0.261706,-0.408352,1.07801,262.033,-138.071)">
                                                <rect height="7" style="fill:rgb(144,224,239);" width="6"
                                                    x="445" y="289" />
                                            </g>
                                            <g transform="matrix(0.833333,0,0,1,73.1667,1)">
                                                <rect height="7" style="fill:rgb(144,224,239);" width="6"
                                                    x="445" y="289" />
                                            </g>
                                            <g transform="matrix(1.16667,0,0,1,427.167,288)">
                                                <path
                                                    d="M28.409,8.526C28.55,7.925 28.442,7.281 28.118,6.786C27.794,6.291 27.29,6 26.756,6C21.587,6 9.286,6 9.286,6L11.857,17L25.119,17C25.892,17 26.57,16.396 26.773,15.526C27.191,13.737 27.903,10.692 28.409,8.526Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <path
                                                d="M445,312C443.344,312 442,313.344 442,315C442,316.656 443.344,318 445,318C446.656,318 448,316.656 448,315C448,313.344 446.656,312 445,312ZM455,312C453.344,312 452,313.344 452,315C452,316.656 453.344,318 455,318C456.656,318 458,316.656 458,315C458,313.344 456.656,312 455,312ZM445,314C445.552,314 446,314.448 446,315C446,315.552 445.552,316 445,316C444.448,316 444,315.552 444,315C444,314.448 444.448,314 445,314ZM455,314C455.552,314 456,314.448 456,315C456,315.552 455.552,316 455,316C454.448,316 454,315.552 454,315C454,314.448 454.448,314 455,314ZM450,290.968L450.526,289.58C450.722,289.064 451.299,288.803 451.815,288.999L455.961,290.569C456.477,290.765 456.737,291.342 456.541,291.859L456.109,293L458.382,293C459.317,293 460.198,293.436 460.766,294.179C461.333,294.922 461.522,295.887 461.276,296.789L459.367,303.789C459.011,305.095 457.825,306 456.472,306L442.281,306L442.591,307.243C442.703,307.688 443.103,308 443.562,308L458,308C458.552,308 459,308.448 459,309C459,309.552 458.552,310 458,310L443.562,310C442.185,310 440.985,309.063 440.651,307.728L440.032,305.253L436.279,292L435,292C434.448,292 434,291.552 434,291C434,290.448 434.448,290 435,290C435,290 435.706,290 436.279,290C437.14,290 437.904,290.551 438.177,291.368L438.721,293L443,293L443,290C443,289.448 443.448,289 444,289L449,289C449.552,289 450,289.448 450,290L450,290.968ZM459.346,296.263L457.437,303.263C457.319,303.698 456.923,304 456.472,304C456.472,304 441.764,304 441.764,304C441.764,304 439.309,295 439.309,295C439.309,295 458.381,295 458.381,295C458.693,295 458.987,295.145 459.176,295.393C459.365,295.641 459.428,295.962 459.346,296.263ZM448,293L445,293L445,291L448,291L448,293ZM451.369,293L452.042,291.224L454.317,292.085L453.97,293L451.369,293Z"
                                                style="fill:rgb(25,144,167);" />
                                        </g>
                                    </svg>
                                    </span>
                                    <span class="ml-2 text-sm"> Fotos Compradas </span>
                                </a>
                            </div>


                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('usuarios.catalogos') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <svg width="32px" height="32px" viewBox="0 0 32 32"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g transform="matrix(1,0,0,1,-192,-48)">
                                            <g transform="matrix(0.882353,0,0,1,25.2941,0)">
                                                <path
                                                    d="M215,53C215,51.895 213.985,51 212.733,51C209.48,51 203.52,51 200.267,51C199.015,51 198,51.895 198,53C198,57.843 198,70.157 198,75C198,76.105 199.015,77 200.267,77C203.52,77 209.48,77 212.733,77C213.985,77 215,76.105 215,75C215,70.157 215,57.843 215,53Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.33333,0,0,1.14286,0.333333,-6.42857)">
                                                <path
                                                    d="M164.75,59L157.25,59L157.25,64.25C157.25,64.714 157.408,65.159 157.689,65.487C157.971,65.816 158.352,66 158.75,66C160.057,66 161.943,66 163.25,66C163.648,66 164.029,65.816 164.311,65.487C164.592,65.159 164.75,64.714 164.75,64.25C164.75,62.177 164.75,59 164.75,59Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <path
                                                d="M199,53L199,75C199,76.657 200.343,78 202,78C204.871,78 210.129,78 213,78C213.796,78 214.559,77.684 215.121,77.121C215.684,76.559 216,75.796 216,75L216,70L218,70C218.796,70 219.559,69.684 220.121,69.121C220.684,68.559 221,67.796 221,67L221,61C221,60.448 220.552,60 220,60L218,60L218,59C218,57.695 217.165,56.583 216,56.171L216,53C216,51.343 214.657,50 213,50C210.129,50 204.871,50 202,50C200.343,50 199,51.343 199,53ZM214,74L201,74L201,75C201,75.552 201.448,76 202,76L213,76C213.265,76 213.52,75.895 213.707,75.707C213.895,75.52 214,75.265 214,75L214,74ZM214,72L214,70L212,70C211.204,70 210.441,69.684 209.879,69.121C209.316,68.559 209,67.796 209,67L209,61C209,60.448 209.448,60 210,60L212,60L212,59C212,57.695 212.835,56.583 214,56.171L214,53C214,52.448 213.552,52 213,52L202,52C201.448,52 201,52.448 201,53L201,72L214,72ZM212,62L211,62C211,62 211,67 211,67C211,67.265 211.105,67.52 211.293,67.707C211.48,67.895 211.735,68 212,68L218,68C218.265,68 218.52,67.895 218.707,67.707C218.895,67.52 219,67.265 219,67L219,62L218,62L218,63C218,63.552 217.552,64 217,64C216.448,64 216,63.552 216,63L216,62L214,62L214,63C214,63.552 213.552,64 213,64C212.448,64 212,63.552 212,63L212,62ZM216,60L216,59C216,58.448 215.552,58 215,58C214.448,58 214,58.448 214,59L214,60L216,60ZM205,55L210,55C210.552,55 211,54.552 211,54C211,53.448 210.552,53 210,53L205,53C204.448,53 204,53.448 204,54C204,54.552 204.448,55 205,55Z"
                                                style="fill:rgb(25,144,167);" />
                                        </g>
                                    </svg>
                                    </span>
                                    <span class="ml-2 text-sm"> Tus catalogos </span>
                                </a>
                            </div>
                            <div x-data="{ isActive: false, open: false }">
                                <!-- active & hover classes 'bg-primary-100 dark:bg-primary' -->
                                <a href="{{ route('usuarios.escanear-qr') }}"
                                    class="flex items-center p-2 text-gray-500 transition-colors rounded-md dark:text-light hover:bg-primary-100 dark:hover:bg-primary"
                                    role="button">
                                    <svg width="32px" height="32px" viewBox="0 0 32 32"
                                        style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"
                                        version="1.1" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                                        xmlns:serif="http://www.serif.com/"
                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <g transform="matrix(1,0,0,1,-192,0)">
                                            <g transform="matrix(1.1,0,0,1.1,-19.5,-0.3)">
                                                <path
                                                    d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.1,0,0,1.1,-4.5,-0.3)">
                                                <path
                                                    d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <g transform="matrix(1.1,0,0,1.1,-19.5,14.7)">
                                                <path
                                                    d="M205,4.818C205,4.336 204.808,3.874 204.467,3.533C204.126,3.192 203.664,3 203.182,3L196.818,3C196.336,3 195.874,3.192 195.533,3.533C195.192,3.874 195,4.336 195,4.818L195,11.182C195,11.664 195.192,12.126 195.533,12.467C195.874,12.808 196.336,13 196.818,13L203.182,13C203.664,13 204.126,12.808 204.467,12.467C204.808,12.126 205,11.664 205,11.182L205,4.818Z"
                                                    style="fill:rgb(144,224,239);" />
                                            </g>
                                            <path
                                                d="M207,20C207,19.204 206.684,18.441 206.121,17.879C205.559,17.316 204.796,17 204,17C202.014,17 198.986,17 197,17C196.204,17 195.441,17.316 194.879,17.879C194.316,18.441 194,19.204 194,20C194,21.986 194,25.014 194,27C194,27.796 194.316,28.559 194.879,29.121C195.441,29.684 196.204,30 197,30C198.986,30 202.014,30 204,30C204.796,30 205.559,29.684 206.121,29.121C206.684,28.559 207,27.796 207,27L207,20ZM219,29L219,28C219,28 221,28 221,28C221.552,28 222,27.552 222,27C222,26.448 221.552,26 221,26L218,26C217.448,26 217,26.448 217,27L217,29C217,29.552 217.448,30 218,30C218.552,30 219,29.552 219,29ZM210,27L210,29C210,29.552 210.448,30 211,30L215,30C215.552,30 216,29.552 216,29L216,27C216,26.448 215.552,26 215,26C214.448,26 214,26.448 214,27L214,28L212,28C212,28 212,27 212,27C212,26.448 211.552,26 211,26C210.448,26 210,26.448 210,27ZM205,20L205,27C205,27.265 204.895,27.52 204.707,27.707C204.52,27.895 204.265,28 204,28L197,28C196.735,28 196.48,27.895 196.293,27.707C196.105,27.52 196,27.265 196,27L196,20C196,19.735 196.105,19.48 196.293,19.293C196.48,19.105 196.735,19 197,19L204,19C204.265,19 204.52,19.105 204.707,19.293C204.895,19.48 205,19.735 205,20ZM204,22C204,21.47 203.789,20.961 203.414,20.586C203.039,20.211 202.53,20 202,20C201.129,20 199.871,20 199,20C198.47,20 197.961,20.211 197.586,20.586C197.211,20.961 197,21.47 197,22C197,22.871 197,24.129 197,25C197,25.53 197.211,26.039 197.586,26.414C197.961,26.789 198.47,27 199,27C199.871,27 201.129,27 202,27C202.53,27 203.039,26.789 203.414,26.414C203.789,26.039 204,25.53 204,25L204,22ZM202,22L202,25L199,25L199,22L202,22ZM212,24L212,22C212,21.448 211.552,21 211,21C210.448,21 210,21.448 210,22L210,24C210,24.552 210.448,25 211,25C211.552,25 212,24.552 212,24ZM215,24L215,23C215,23 216,23 216,23C216.552,23 217,22.552 217,22C217,21.448 216.552,21 216,21L214,21C213.448,21 213,21.448 213,22L213,24C213,24.552 213.448,25 214,25C214.552,25 215,24.552 215,24ZM218,25L221,25C221.552,25 222,24.552 222,24L222,22C222,21.448 221.552,21 221,21C220.448,21 220,21.448 220,22L220,23C220,23 218,23 218,23C217.448,23 217,23.448 217,24C217,24.552 217.448,25 218,25ZM221,18L211,18C210.448,18 210,18.448 210,19C210,19.552 210.448,20 211,20L221,20C221.552,20 222,19.552 222,19C222,18.448 221.552,18 221,18ZM207,5C207,4.204 206.684,3.441 206.121,2.879C205.559,2.316 204.796,2 204,2C202.014,2 198.986,2 197,2C196.204,2 195.441,2.316 194.879,2.879C194.316,3.441 194,4.204 194,5C194,6.986 194,10.014 194,12C194,12.796 194.316,13.559 194.879,14.121C195.441,14.684 196.204,15 197,15C198.986,15 202.014,15 204,15C204.796,15 205.559,14.684 206.121,14.121C206.684,13.559 207,12.796 207,12L207,5ZM222,5C222,4.204 221.684,3.441 221.121,2.879C220.559,2.316 219.796,2 219,2C217.014,2 213.986,2 212,2C211.204,2 210.441,2.316 209.879,2.879C209.316,3.441 209,4.204 209,5C209,6.986 209,10.014 209,12C209,12.796 209.316,13.559 209.879,14.121C210.441,14.684 211.204,15 212,15C213.986,15 217.014,15 219,15C219.796,15 220.559,14.684 221.121,14.121C221.684,13.559 222,12.796 222,12L222,5ZM205,5L205,12C205,12.265 204.895,12.52 204.707,12.707C204.52,12.895 204.265,13 204,13L197,13C196.735,13 196.48,12.895 196.293,12.707C196.105,12.52 196,12.265 196,12L196,5C196,4.735 196.105,4.48 196.293,4.293C196.48,4.105 196.735,4 197,4L204,4C204.265,4 204.52,4.105 204.707,4.293C204.895,4.48 205,4.735 205,5ZM220,5L220,12C220,12.265 219.895,12.52 219.707,12.707C219.52,12.895 219.265,13 219,13L212,13C211.735,13 211.48,12.895 211.293,12.707C211.105,12.52 211,12.265 211,12L211,5C211,4.735 211.105,4.48 211.293,4.293C211.48,4.105 211.735,4 212,4L219,4C219.265,4 219.52,4.105 219.707,4.293C219.895,4.48 220,4.735 220,5ZM204,7C204,6.47 203.789,5.961 203.414,5.586C203.039,5.211 202.53,5 202,5C201.129,5 199.871,5 199,5C198.47,5 197.961,5.211 197.586,5.586C197.211,5.961 197,6.47 197,7C197,7.871 197,9.129 197,10C197,10.53 197.211,11.039 197.586,11.414C197.961,11.789 198.47,12 199,12C199.871,12 201.129,12 202,12C202.53,12 203.039,11.789 203.414,11.414C203.789,11.039 204,10.53 204,10L204,7ZM219,7C219,6.47 218.789,5.961 218.414,5.586C218.039,5.211 217.53,5 217,5C216.129,5 214.871,5 214,5C213.47,5 212.961,5.211 212.586,5.586C212.211,5.961 212,6.47 212,7C212,7.871 212,9.129 212,10C212,10.53 212.211,11.039 212.586,11.414C212.961,11.789 213.47,12 214,12C214.871,12 216.129,12 217,12C217.53,12 218.039,11.789 218.414,11.414C218.789,11.039 219,10.53 219,10L219,7ZM202,7L202,10L199,10L199,7L202,7ZM217,7L217,10L214,10L214,7L217,7Z"
                                                style="fill:rgb(25,144,167);" />
                                        </g>
                                    </svg>
                                    </span>
                                    <span class="ml-2 text-sm"> Escanear QR </span>
                                </a>
                            </div>

                        </nav>
                    </div>
                </header>

                <!-- Main content -->
                <main>
                    @yield('content')
                </main>

            </div>

            <!-- Panels -->

            <!-- Settings Panel -->
            <!-- Backdrop -->
            <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-show="isSettingsPanelOpen" @click="isSettingsPanelOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker" style="opacity: 0.5" aria-hidden="true"></div>
            <!-- Panel -->
            <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                x-ref="settingsPanel" tabindex="-1" x-show="isSettingsPanelOpen"
                @keydown.escape="isSettingsPanelOpen = false"
                class="fixed inset-y-0 right-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none"
                aria-labelledby="settinsPanelLabel">
                <div class="absolute left-0 p-2 transform -translate-x-full">
                    <!-- Close button -->
                    <button @click="isSettingsPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <!-- Panel content -->
                <div class="flex flex-col h-screen">
                    <!-- Panel header -->
                    <div
                        class="flex flex-col items-center justify-center flex-shrink-0 px-4 py-8 space-y-4 border-b dark:border-primary-dark">
                        <span aria-hidden="true" class="text-gray-500 dark:text-primary">
                            <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                            </svg>
                        </span>
                        <h2 id="settinsPanelLabel" class="text-xl font-medium text-gray-500 dark:text-light">Settings
                        </h2>
                    </div>
                    <!-- Content -->
                    <div class="flex-1 overflow-hidden hover:overflow-y-auto">
                        <!-- Theme -->
                        <div class="p-4 space-y-4 md:p-8">
                            <h6 class="text-lg font-medium text-gray-400 dark:text-light">Mode</h6>
                            <div class="flex items-center space-x-8">
                                <!-- Light button -->
                                <button @click="setLightTheme"
                                    class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                    :class="{
                                        'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100':
                                            !
                                            isDark,
                                        'text-gray-500 dark:text-primary-light': isDark
                                    }">
                                    <span>
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                        </svg>
                                    </span>
                                    <span>Light</span>
                                </button>

                                <!-- Dark button -->
                                <button @click="setDarkTheme"
                                    class="flex items-center justify-center px-4 py-2 space-x-4 transition-colors border rounded-md hover:text-gray-900 hover:border-gray-900 dark:border-primary dark:hover:text-primary-100 dark:hover:border-primary-light focus:outline-none focus:ring focus:ring-primary-lighter focus:ring-offset-2 dark:focus:ring-offset-dark dark:focus:ring-primary-dark"
                                    :class="{
                                        'border-gray-900 text-gray-900 dark:border-primary-light dark:text-primary-100': isDark,
                                        'text-gray-500 dark:text-primary-light':
                                            !isDark
                                    }">
                                    <span>
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                        </svg>
                                    </span>
                                    <span>Dark</span>
                                </button>
                            </div>
                        </div>

                        <!-- Colors -->
                        <div class="p-4 space-y-4 md:p-8">
                            <h6 class="text-lg font-medium text-gray-400 dark:text-light">Colors</h6>
                            <div>
                                <button @click="setColors('cyan')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-cyan)"></button>
                                <button @click="setColors('teal')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-teal)"></button>
                                <button @click="setColors('green')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-green)"></button>
                                <button @click="setColors('fuchsia')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-fuchsia)"></button>
                                <button @click="setColors('blue')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-blue)"></button>
                                <button @click="setColors('violet')" class="w-10 h-10 rounded-full"
                                    style="background-color: var(--color-violet)"></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Notification panel -->
            <!-- Backdrop -->
            <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-show="isNotificationsPanelOpen" @click="isNotificationsPanelOpen = false"
                class="fixed inset-0 z-10 bg-primary-darker" style="opacity: 0.5" aria-hidden="true"></div>
            <!-- Panel -->
            <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                x-ref="notificationsPanel" x-show="isNotificationsPanelOpen"
                @keydown.escape="isNotificationsPanelOpen = false" tabindex="-1"
                aria-labelledby="notificationPanelLabel"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button @click="isNotificationsPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
                    <!-- Panel header -->
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-primary-darker">
                            <h2 id="notificationPanelLabel" class="pb-4 font-semibold"style="font-family: 'Times New Roman', serif;" >Notificaciones</h2>
                            <div class="space-x-2">
                                <button @click.prevent="activeTabe = 'action'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{
                                        'border-primary-dark dark:border-primary': activeTabe ==
                                            'action',
                                        'border-transparent': activeTabe != 'action'
                                    }" style="font-family: 'Times New Roman', serif;">
                                    Accion
                                </button>
                                <button @click.prevent="activeTabe = 'user'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{
                                        'border-primary-dark dark:border-primary': activeTabe ==
                                            'user',
                                        'border-transparent': activeTabe != 'user'
                                    }"style="font-family: 'Times New Roman', serif;">
                                    Usario
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Panel content (tabs) -->
                    <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Action tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">

                            @can('fotografo.notificaciones')
                                @livewire('fotografo.perfil.notificaciones')
                            @endcan

                            @livewire('usuarios.notificacion-foto')

                        </div>

                        <!-- User tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                            <p class="px-4">User tab content</p>
                            <!--  -->
                            <!-- User tab content -->

                            <!--  -->
                        </div>
                    </div>
                </div>
            </section>

            <!-- Search panel -->
            <!-- Backdrop -->
            <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSearchPanelOpen"
                @click="isSearchPanelOpen = false" class="fixed inset-0 z-10 bg-primary-darker" style="opacity: 0.5"
                aria-hidden="ture"></div>
            <!-- Panel -->
            <section x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                x-show="isSearchPanelOpen" @keydown.escape="isSearchPanelOpen = false"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button @click="isSearchPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h2 class="sr-only">Search panel</h2>
                <!-- Panel content -->
                <div class="flex flex-col h-screen">
                    <!-- Panel header (Search input) -->
                    <div
                        class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-primary-darker dark:focus-within:text-light focus-within:text-gray-700">
                        <span class="absolute inset-y-0 inline-flex items-center px-4">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input x-ref="searchInput" type="text"
                            class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                            placeholder="Search..." />
                    </div>

                    <!-- Panel content (Search result) -->
                    <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden h hover:overflow-y-auto">
                        <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                        <p class="px=4">Search resault</p>
                        <!--  -->
                        <!-- Search content -->
                        <!--  -->
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- All javascript code in this project for now is just for demo DON'T RELY ON IT  -->

    @yield('css')


    @yield('js')

    <script>
        Livewire.on('datos-guardados', function() {
            Swal.fire(
                'Tus Fotos han sido guardadas',
                'Recuerda solo subir maximo 3 fotos',
                'success'
            )
        });

        Livewire.on('error-foto', function() {
            Swal.fire(
                'Solo 3 fotos',
                'Los demas datos fueron guardados, menos las fotos',
                'question'
            )
        });

        Livewire.on('eliminar-datos', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Datos eliminados correctamente',
                showConfirmButton: false,
                timer: 1500
            })
        });

        Livewire.on('seguro-de-comprar', function(marcadas) {
            Swal.fire({
                title: 'Estas seguro de comprar?',
                text: "Si aceptas se te descontara de tu tarjeta de Credito!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, estoy seguro'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('vista_catalogo_comprar', marcadas);
                    Swal.fire(
                        'Comprado!',
                        'Las fotos han sido compradas exitosamente.',
                        'success'
                    )
                }
            })

        });
    </script>

    <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Buen Trabajo',
                message,
                'success'
            )
        })
    </script>

    <script>
        const setup = () => {
            const getTheme = () => {
                if (window.localStorage.getItem('dark')) {
                    return JSON.parse(window.localStorage.getItem('dark'))
                }
                return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
            }

            const setTheme = (value) => {
                window.localStorage.setItem('dark', value)
            }

            const getColor = () => {
                if (window.localStorage.getItem('color')) {
                    return window.localStorage.getItem('color')
                }
                return 'cyan'
            }

            const setColors = (color) => {
                const root = document.documentElement
                root.style.setProperty('--color-primary', `var(--color-${color})`)
                root.style.setProperty('--color-primary-50', `var(--color-${color}-50)`)
                root.style.setProperty('--color-primary-100', `var(--color-${color}-100)`)
                root.style.setProperty('--color-primary-light', `var(--color-${color}-light)`)
                root.style.setProperty('--color-primary-lighter', `var(--color-${color}-lighter)`)
                root.style.setProperty('--color-primary-dark', `var(--color-${color}-dark)`)
                root.style.setProperty('--color-primary-darker', `var(--color-${color}-darker)`)
                this.selectedColor = color
                window.localStorage.setItem('color', color)
            }

            return {
                loading: true,
                isDark: getTheme(),
                color: getColor(),
                selectedColor: 'cyan',
                toggleTheme() {
                    this.isDark = !this.isDark
                    setTheme(this.isDark)
                },
                setLightTheme() {
                    this.isDark = false
                    setTheme(this.isDark)
                },
                setDarkTheme() {
                    this.isDark = true
                    setTheme(this.isDark)
                },
                setColors,
                toggleSidbarMenu() {
                    this.isSidebarOpen = !this.isSidebarOpen
                },
                isSettingsPanelOpen: false,
                openSettingsPanel() {
                    this.isSettingsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.settingsPanel.focus()
                    })
                },
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
                isMobileSubMenuOpen: false,
                openMobileSubMenu() {
                    this.isMobileSubMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileSubMenu.focus()
                    })
                },
                isMobileMainMenuOpen: false,
                openMobileMainMenu() {
                    this.isMobileMainMenuOpen = true
                    this.$nextTick(() => {
                        this.$refs.mobileMainMenu.focus()
                    })
                },
            }
        }
    </script>




</body>

</html>
