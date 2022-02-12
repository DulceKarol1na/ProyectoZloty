@extends('layouts.guest')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="5OuteJ84L79Uw08QQwVY2jBFT5YFIjvYYJgiArAC">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">        
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/inicioSesion.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/registro.css">
        <!-- Scripts -->
        <script src="/js/app.js" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
             
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div style="background-color: #fff0;" class="card">

                    
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
            <div class="container">
                <div class="justify-content-center">
                    <div class="col-md-10">
                        
                    <img style="position: fixed; border-left-width: 450px; width: 300px; margin-left: 450px;" src="/img/bigblanco.png" class="user-image" alt="Logo">

                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    
                                    <input type="hidden" name="token" value="{{ $token }}">

                                        <label style="color: white;" for="email" class="text-md-right">{{ __('E-Mail') }}</label>

                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror


                                        <label style="color: white;" for="password" class="col-form-label text-md-right">{{ __('Contraseña') }}</label>
                            
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>La confirmación de la contraseña no coincide.</strong>
                                                </span>
                                            @enderror


                                        <label style="color: white;" for="password-confirm" class="col-form-label text-md-right">{{ __('Confirma contraseña') }}</label>

                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                        <div class="col-md-6 offset-md-10">
                                        <p></p>
                                            <button style="width: 195px;"  type="submit" class="btn btn-primary">
                                                {{ __('Cambiar contraseña') }}
                                            </button>
                                        </div>

                                </form>




@endsection
