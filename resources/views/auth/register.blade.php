<section>
    <div class="container">
        <div class="user singinBX">
            <div class="imgBx">
                <img src="https://img.freepik.com/fotos-premium/2d-ilustracion-fotografo-camara-hombre-dibujos-animados-masculinos-estilo-plano-insignia-logotipo-simple-ia-generativa_159242-27803.jpg?w=2000">
            </div>

            <div class="box">
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
                <form autocomplete="off" method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2>Registrarte</h2>

                    <div class="inputBox">
                        <input type="text" id="name" type="text" name="name" :value="old('name')"
                            required autofocus autocomplete="name">
                        <span>Nombre de Usuario</span>
                        <i></i>
                    </div>
                    @error('name')
                        <span class="incorrecto" role="alert">
                            <strong>Su nombre es incorrecto</strong>
                        </span>
                    @enderror



                    <div class="inputBox">
                        <input id="email" type="email" name="email" :value="old('email')" required >
                        <span>Correo Electronico</span>
                        <i></i>
                    </div>
                    @error('email')
                        <span class="incorrecto" role="alert">
                            <strong>Su correo electronico es incorrecto</strong>
                        </span>
                    @enderror


                    <div class="inputBox">
                        <input id="password" type="password" name="password" required autocomplete="new-password" >
                        <span>Contraseña</span>
                        <i></i>
                    </div>


                    <div class="inputBox">
                        <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                        <span>Repita su Contraseña</span>
                        <i></i>
                    </div>



                    <div class="links">
                        <a href="{{ route('login') }}">Ya tengo Cuenta</a>
                    </div>
                    <br>

                    <button class="" type="submit" style="border-radius: 10px; border: 2px solid #000; background: #070707;"><span>Registrarme<i></i></span></button>
                </form>
            </div>

        </div>


    </div>
</section>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    section {
        position: relative;
        min-height: 100vh;
        background: linear-gradient(rgba(94, 93, 93, 0.7), rgba(49, 48, 48, 0.7)), url(data:image/jpeg;base64,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) center center;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        /* Ajusta el brillo de la imagen (valor superior a 1 para aclarar) */
        filter: brightness(1.9);
    }

    section .container {
        position: relative;
        width: 800px;
        height: 600px;
        background: #fff;
        box-shadow: 0 15px 50px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        border-radius: 20px;
    }

    section .container .user {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
    }

    section .container .user .imgBx {
        position: relative;
        width: 50%;
        height: 100%;
        background: rgb(8, 8, 8);
        transition: 0.5s;
    }

    section .container .user .imgBx img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border: solid;
        border-width: 5px;
        border-color: black;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
    }

    
    section .container .user .formBx form h2 {
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-align: center;
        width: 100%;
        margin-bottom: 10px;
        color: #555;
    }


    .box {
        display: flex;
        position: relative;
        width: 50%;
        height: 100%;
        background: #1c1c1c;
        overflow: hidden;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
        /* box-shadow: 0 0 35px #45f3ff; */
    }

    form {
        position: absolute;
        inset: 2px;
        background: #4f5158;
        padding: 50px 40px;
        z-index: 2;
        display: flex;
        flex-direction: column;
        border-top-right-radius: 20px;
        border-bottom-right-radius: 20px;
    }

    h2 {
        color: rgb(14, 13, 13);
        font-weight: 500;
        text-align: center;
        letter-spacing: 0.1em;
    }

    .inputBox {
        position: relative;
        width: 300px;
        margin-top: 35px;
    }

    .inputBox input {
        position: relative;
        width: 100%;
        padding: 20px 10px 10px;
        background: transparent;
        outline: none;
        box-shadow: none;
        border: none;
        color: #23242a;
        font-size: 1em;
        letter-spacing: 0.05em;
        transition: 0.5s;
        z-index: 10;
    }

    .inputBox span {
        position: absolute;
        left: 0;
        padding: 20px 0px 10px;
        pointer-events: none;
        font-size: 1em;
        color: #8f8f8f;
        letter-spacing: 0.05em;
        transition: 0.5s;
    }

    .inputBox input:valid~span,
    .inputBox input:focus~span {
        color: rgb(0, 0, 0);
        transform: translateX(0px) translateY(-34px);
        font-size: 0.75em;
    }

    .inputBox i {
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 2px;
        background: rgb(255, 251, 251);
        border-radius: 4px;
        overflow: hidden;
        transition: 0.5s;
        pointer-events: none;
        z-index: 9;
    }

    .inputBox input:valid~i,
    .inputBox input:focus~i {
        height: 44px;
    }

    .links {
        display: flex;
        justify-content: space-between;
    }

    .links a {
        margin: 10px 0;
        font-size: 1em;
        color: #8f8f8f;
        text-decoration: beige;
    }

    .links a:hover,
    .links a:nth-child(1) {
        color: rgb(22, 22, 22);
    }

    input[type="submit"] {
        border: none;
        outline: none;
        padding: 11px 25px;
        background: rgb(255, 0, 0);
        cursor: pointer;
        border-radius: 4px;
        font-weight: 600;
        width: 100px;
        margin-top: 10px;
    }

    input[type="submit"]:active {
        opacity: 0.8;
    }

    .incorrecto {
        color: white;
        margin-top: 5px;
    }

    button {
        position: relative;
        background: #444;
        color: #fff;
        text-decoration: none;
        text-transform: uppercase;
        font-size: 1.2em;
        letter-spacing: 0.1em;
        padding: 10px 30px;
        transition: 0.5s;
        margin-top: 5px;
    }

    button:hover {
        letter-spacing: 0.25em;
        background: var(--clr);
        box-shadow: 0 0 35px var(--clr);
    }

    button::before {
        content: '';
        position: absolute;
        inset: 2px;
        background: #27282c;
    }

    button span {
        position: relative;
        z-index: 1;
    }

   

   

    button:hover i::before {
        width: 20px;
        left: 20%;
    }

    
</style>
