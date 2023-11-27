<section>
    <link rel="stylesheet" href="{{asset("css/login.css")}}" type="text/css">
    <div class="container">
        <div class="user singinBX">
            <div class="imgBx">
                <img
                    src="https://img.freepik.com/vector-premium/ilustracion-dibujos-animados-camara_152558-71.jpg">
            </div>

            <div class="box">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form autocomplete="off" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2>Iniciar sesión</h2>
                    <div class="inputBox">
                        <input type="text" id="email" name="email" :value="old('email')" required="required">
                        <span>Correo Electronico</span>
                        <i></i>
                    </div>
                    @error('email')
                        <span class="incorrecto" role="alert">
                            <strong>Su correo electronico es incorrecto</strong>
                        </span>
                    @enderror
                    <div class="inputBox">
                        <input type="password" id="password" name="password" required autocomplete="current-password">
                        <span>Contraseña</span>
                        <i></i>
                    </div>
                    <br>
                    <div class="links">
                        

                        <a href="{{ route('register') }}">Registrarse</a>
                    </div>
                    <button class="" type="submit" style=" border-radius: 10px;; border: 2px solid #000;"
                        ><span>Ingresar<i></i></span></button>
                </form>
            </div>

        </div>


    </div>
</section>
