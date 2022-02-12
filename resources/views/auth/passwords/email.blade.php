@extends('layouts.guest')
@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div style="background-color: #fff0;" class="card">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container divInterno">
    <div class="row">
        <div class="col-lg-6  p-5" style ="height: 496px;">
            <!-- parte del logo  -->
            <section>
                <div>
                    <img src="img/bigblanco.png" alt="" width="150px">
                </div>
            </section>

            <!-- titulo principal -->
            <section>
                <h1 class="tituloInicio">Recupera tu contraseña!</h1>
                <p> </p>
            </section>
            <!-- formulario  -->
			
			<form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row">
                        
                        <input placeholder="Escribe tu email" id="email"  type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>No encontramos tu correo, por favor verifícalo</strong>
                                    </span>
                                @enderror

                        </div>
                        <p> </p>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enviar') }}
                                </button>
                            </div>
                        </div>
             </form>

        </div>
        <!-- div derecho imagen and texto  -->
        <div class="imagen">
            <div class="caption ">
                <section>
                    <h3 class=" letraImagen">¡No te has registrado!</h3>
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
                </div>
            </div>
        </div>
    </div>
</div>

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
@endsection
