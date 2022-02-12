@extends('layouts.guest')

@section('content') 
<div>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
@endif
 <!-- seccion de grid repartida en img y los inputs -->
 <div class="container divInterno">
    <div class="row">
        <div class="col-lg-6  p-5 ">
            <!-- parte del logo  -->
            <section>
                <div>
                    <img src="img/bigblanco.png" alt="" width="150px">
                </div>
            </section>

            <!-- titulo principal -->
            <section>
                <h1 class="tituloInicio">Inicio Sesión</h1>
            </section>
            <!-- formulario  -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- email -->
                <div class="form-group mt-4">

                <label for="Email" class="colorLabel" value="{{ __('Email') }}">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Tu contraseña o email están mal, ¡por favor verifica!</strong>
                        </span>
                    @enderror

                
                   
                 
                </div>
                <!-- contraseña -->
                <div class="form-group mt-3">
                    <label for="password" class="colorLabel" value="{{ __('Password') }}">Contraseña</label>
                    <input type="password" class="form-control inputPeque" type="password" name="password" required autocomplete="current-password" id="contrainput" required>
                </div>
                <!-- seccion de botones  -->
                <section>
                    <div class="container">
                        <div class="row">

                            <!-- olvidarContraseña -->
                            <div class="col-sm mt-3">
                                @if (Route::has('password.request'))
                                    <i class="fas fa-key"></i>
                                    <a class="olvidoContrase" href="{{ route('password.request') }}">
                                        {{ __('¿Olvidaste tu contraseña?') }}
                                    </a>
                                @endif
                            </div>
                            <div class="col-sm">
                                <x-jet-button class="btn colorBoton ml-5 mt-3">
                                    {{ __('Login') }}
                                </x-jet-button>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- flecha de regreso  -->
                <a href="/"><i class="fas fa-arrow-left mt-4"></i></a>
            </form>

        </div>
        <!-- div derecho imagen and texto  -->
        <div class="imagen">
            <div class="caption ">
                <section>
                    <h3 class=" letraImagen">!No te has registrado!</h3>
                </section>
                <div class="textoicon">
                    <div>
                        <i class="far fa-check-circle">
                        </i>
                        <p class="mensajeparrafo"> Registrate </p>
                    </div>
                    <div>
                        <i class="far fa-check-circle">
                        </i>
                        <p class="mensajeparrafo"> Haz tus cambio o donaciones en menos de 5 min</p>
                    </div>
                </div>
                <button type="submit" class="btn colorRegistro mt-3"><a
                        href="{{ route('register') }}"
                        style="text-decoration: none; color:white">
                        Registrate!</a>
                </button>
            </div>
        </div>
    </div>
</div>
        <script>
            let correo = document.getElementById("correoinput");
            let contra = document.getElementById("contrainput");

            function validarLoguin() {
                if (correo.value === "user@gmail.com") {
                    if (contra.value === "2067463") {
                        window.location.href = "";
                    } else {
                        alert("contraseña incorrecta")
                    }
                } else if (correo.value === "fundacion@gmail.com") {
                    if (contra.value === "7905339") {
                        window.location.href = "";
                    } else {
                        alert("contraseña incorrecta")
                    }
                } else {
                    alert('el usuario no existe')
                }
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
        </script>
        <script src="https://kit.fontawesome.com/437f265f51.js" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="./js/iniciarSesion.js"></script>
</div>
@endsection

