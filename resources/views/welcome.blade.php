<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
        Jose-Photo
    </title>
    <meta name="description" content="Simple landind page" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <!-- Define your gradient here - use online tools to find a gradient matching your branding-->
    <style>
        .gradient {
            background: linear-gradient(90deg, #CCCCCC 0%, #333333 100%);
        }
    </style>
</head>
<body class="leading-normal tracking-normal text-black gradient" style="font-family: 'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 text-white bg-gray-200">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <div class="pl-4 flex items-center">
                <a class="toggleColour text-black no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
                    
                    Jose-Photo
                </a>
            </div>
            <div class="block lg:hidden pr-4">
                <button id="nav-toggle"
                    class="flex items-center p-1 text-pink-800 hover:text-gray-900 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                    <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                    </svg>
                </button>
            </div>
            <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-gray-200 lg:bg-transparent text-black p-4 lg:p-0 z-20"
                id="nav-content">
                <ul class="list-reset lg:flex justify-end flex-1 items-center">
                    <!-- Agrega tus elementos de menú aquí si es necesario -->
                </ul>
                <a id="navAction" href="{{ route('login') }}"
                    class="mx-auto lg:mx-0 hover:underline bg-gray-200 text-gray-800 font-bold mt-4 lg:mt-0 py-4 px-8 shadow opacity-75 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">Iniciar
                    sesión</a>
            </div>
        </div>
        <hr class="border-b border-black opacity-25 my-0 py-0" />
    </nav>
    <!--Hero-->
    <div class="pt-24">
        <br>
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-2/5 justify-center items-start text-center md:text-left">
                
                <h1 class="my-4 text-5xl font-bold leading-tight">
                    La app del futuro 
                </h1>
                    <a href="{{ route('register') }}"
                        class="mx-auto lg:mx-0 bg-gray-200 text-gray-800 font-bold  my-6 py-4 px-8 bg-white hover:bg-yellow-600 py-1 rounded transform transition duration-500 hover:scale-110">
                        Registrate
                    </a>

                <p class="leading-normal text-2xl mb-8">
                    ¡Jose-Photo la mejor app de fotos!
                </p>
                <br>
            </div>

            <!--Right Col-->
            <div class="w-full md:w-2/5 py-6 text-center ">
                <img class="w-full md:w-4/5 z-50  shadow-2xl"
                    src="https://us.123rf.com/450wm/plus69/plus691504/plus69150400005/38995784-fot%C3%B3grafo-toma-una-foto-vista-frontal-primer-plano.jpg" />
            </div>
        </div>
    </div>

    <br>




    <section class="bg-white border-b py-8">
        <div class="container max-w-5xl mx-auto m-8">
            <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                Informacion sobre nosotros
            </h2>
        
            <div class="flex flex-wrap">
                <div class="w-5/6 sm:w-1/2 p-6">
                    <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                        Encargado del proyecto
                    </h3>
                    <p class="text-gray-600 mb-8">
                        Estudiante Jose Carlos Alarcon Del Pozo
                        <br />
                        <br />
                    </p>
                </div>
                <div class="w-full sm:w-1/2 p-6">
                    <svg class="w-full sm:h-64 mx-auto" viewBox="0 0 1177 598.5" xmlns="http://www.w3.org/2000/svg">
                        <title>travel booking</title>
                        
                    
                        <image href="{{ asset('icono/fotojose.jpg') }}" x="0" y="0" width="100%" height="100%" />
                      
                        
                    
                        
                    </svg>
                </div>
            </div>
            
            <div class="flex flex-wrap flex-col-reverse sm:flex-row">
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <svg class="w-5/6 sm:h-64 mx-auto" viewBox="0 0 1176.60617 873.97852"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>connected world</title>
                        <image href="https://www.desktopbackground.org/download/1680x1050/2011/05/28/210332_modern-family-picnic-table-1920x1080-full-hd-16-9-wallpapers_1920x1080_h.jpg" x="0" y="0" width="100%" height="100%" />
                       
                    </svg>
                </div>
                <div class="w-full sm:w-1/2 p-6 mt-6">
                    <div class="align-middle">
                        <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
                            Informacion del proyecto
                        </h3>
                        <p class="text-gray-600 mb-8">
                            Un sistema de subcripcion para la venta de fotos con IA
                            <br />
                            <br />
    
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Change the colour #f8fafc to match the previous section colour -->
    
    
    <!--Footer-->
    <footer class="bg-white">
        <div class="container mx-auto px-8">
            <div class="w-full flex flex-col md:flex-row py-6">
                <div class="flex-1 mb-6 text-black">
                    <a class="text-black no-underline hover:no-underline font-bold text-2xl lg:text-3xl"
                        href="#">
                        <!--Icon from: http://www.potlabicons.com/ -->
                        <svg class="h-8 fill-current inline" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                            width="50" height="50" fill="none">
                            <style>
                                @keyframes instagram {

                                    0%,
                                    40% {
                                        transform: scale(.4)
                                    }

                                    20% {
                                        transform: scale(.6)
                                    }

                                    60% {
                                        transform: scale(.8)
                                    }

                                    to {
                                        transform: scale(1)
                                    }
                                }
                            </style>
                            
                          
                        </svg>
                        Jose-Photo
                    </a>
                </div>

                
               
                <div class="flex-1">
                    <p class="uppercase text-gray-500 md:mb-6">Correo</p>
                    <ul class="list-reset mb-6">
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500"> joseadp5@gmail.com
                                Blog</a>
                        </li>
                        <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                            <a href="#"
                                class="no-underline hover:underline text-gray-800 hover:text-pink-500">69027621</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <a href="https://www.freepik.com/free-photos-vectors/background" class="text-gray-500">Background vector
            created by freepik - www.freepik.com</a>
    </footer>
    <!-- jQuery if you need it
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  -->
    <script>
        var scrollpos = window.scrollY;
        var header = document.getElementById("header");
        var navcontent = document.getElementById("nav-content");
        var navaction = document.getElementById("navAction");
        var brandname = document.getElementById("brandname");
        var toToggle = document.querySelectorAll(".toggleColour");

        document.addEventListener("scroll", function() {
            /*Apply classes for slide in bar*/
            scrollpos = window.scrollY;

            if (scrollpos > 10) {
                header.classList.add("bg-white");
                navaction.classList.remove("bg-white");
                navaction.classList.add("gradient");
                navaction.classList.remove("text-gray-800");
                navaction.classList.add("text-white");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-gray-800");
                    toToggle[i].classList.remove("text-white");
                }
                header.classList.add("shadow");
                navcontent.classList.remove("bg-gray-100");
                navcontent.classList.add("bg-white");
            } else {
                header.classList.remove("bg-white");
                navaction.classList.remove("gradient");
                navaction.classList.add("bg-white");
                navaction.classList.remove("text-white");
                navaction.classList.add("text-gray-800");
                //Use to switch toggleColour colours
                for (var i = 0; i < toToggle.length; i++) {
                    toToggle[i].classList.add("text-white");
                    toToggle[i].classList.remove("text-gray-800");
                }

                header.classList.remove("shadow");
                navcontent.classList.remove("bg-white");
                navcontent.classList.add("bg-gray-100");
            }
        });
    </script>
    <script>
        /*Toggle dropdown list*/
        /*https://gist.github.com/slavapas/593e8e50cf4cc16ac972afcbad4f70c8*/

        var navMenuDiv = document.getElementById("nav-content");
        var navMenu = document.getElementById("nav-toggle");

        document.onclick = check;

        function check(e) {
            var target = (e && e.target) || (event && event.srcElement);

            //Nav Menu
            if (!checkParent(target, navMenuDiv)) {
                // click NOT on the menu
                if (checkParent(target, navMenu)) {
                    // click on the link
                    if (navMenuDiv.classList.contains("hidden")) {
                        navMenuDiv.classList.remove("hidden");
                    } else {
                        navMenuDiv.classList.add("hidden");
                    }
                } else {
                    // click both outside link and outside menu, hide menu
                    navMenuDiv.classList.add("hidden");
                }
            }
        }

        function checkParent(t, elm) {
            while (t.parentNode) {
                if (t == elm) {
                    return true;
                }
                t = t.parentNode;
            }
            return false;
        }
    </script>
</body>

</html>
