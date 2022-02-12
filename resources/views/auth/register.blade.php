
@extends('layouts.guest')
    @section('content')
        <div class="container divInterno">
                <div class="row">
                    <div class="imagen">
                        <div class="mt-5 ml-5">
                            <section>
                                <div>
                                    <img src="../img/bigblanco.png" alt="" width="150px">
                                </div>
                            </section>
                            <section>
                                <h3 class=" letraImagen">!No te has registrado!</h3>
                            </section>
                            <div class="textoicon">
                                  <div>
                                    <i class="far fa-check-circle">
                                    </i>
                                    <p class="mensajeparrafo"> Haz tus cambio o donaciones en menos de 5 min</p>
                                </div>
                            </div>
                            <button type="submit" class="btn colorRegistro mt-3"><a
                            href="{{ route('login') }}"
                                    style="text-decoration: none; color:white">
                                    inicia Sesion</a>
                            </button>

                        </div>


                    </div>

                    <!-- div derecho imagen and texto  -->
                    <div class="col-lg-6  p-5 ">
                        <!-- parte del logo  -->

                        <!-- titulo principal -->
                        <section>
                            <h1 class="tituloInicio">Registrate</h1>
                        </section>
                        <!-- formulario  -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-row">
                                <!-- nombre -->
                                <div class="form-group col-md-11  ml-6">
                                    <label for="nombre" class="colorLabel">Nombre</label>
                                    <input type="text" class="form-control inputPeque" type="text" id="nombre" placeholder="Nombre" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                
                                </div>
                            </div>
                            <div class="form-row">
                            <!-- email -->
                                <div class="form-group col-md-11  ml-6">
                                    <label for="email" class="colorLabel">Email</label>
                                    <input type="email" class="form-control inputPeque" id="correo" placeholder="nombre@gmail.com" name="email" :value="old('email')" required>
                                </div>
                            </div>
                            <!-- contacto -->
                            <div class="form-row">
                                <div class="form-group col-md-7 ml-3">
                                    <label for="numero" class="colorLabel">N. Contacto</label>
                                    <input type="text"  minlength="10"  class="form-control inputPeque" name="phone"
                                    id="numerocel" placeholder="32333333232" required>
                                </div>
                                <!-- ciudad -->
                                <div class="form-group col-md-4 ml-3">
                                    <label for="inputState" class="colorLabel">Ciudad</label>
                                    <select id="inputState" type="text" name="city" class="form-control controls" required>
                                        <option selected>Bogotá D.C</option>
                                        <option>Medellín</option>
                                        <option>Calí</option>
                                        <option>Barranquilla</option>
                                        <option>Cartagena</option>
                                        <option>Bucaramanga</option>
                                        <option>Manizales</option>
                                        <option>Pereira</option>
                                        <option>Cúcuta</option>
                                        <option>Ibagué</option>
                                        <option>Valledupar</option>
                                        <option>Boyáca</option>
                                        <option>Pasto</option>
                                        <option>Armenia</option>
                                        <option>Villavicencio</option>
                                        <option>Neiva</option>
                                        <option>Popayán</option>
                                        <option>Armenia</option>
                                    </select>
                                </div>
                            </div>
                            <!-- introduce la contraseña -->
                            <div class="form-row contenedorCompleto ml-3">
                                <div class="form-group mt-3">
                                    <label for="password" class="colorLabel">Introduce una contraseña</label>
                                    <input required minlength="8" type="password" class="form-control inputPeque" id="password"
                                    type="password" name="password"  autocomplete="new-password">
                                </div>
                                <div class="form-group mt-3 ml-4">
                                    <label for="password" class="colorLabel">Confirmar contraseña</label>
                                    <input type="password" class="form-control inputPeque" id="password"
                                    name="password_confirmation" required minlength="8" autocomplete="new-password">
                                </div>
                            </div>
                            
                            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-jet-label for="terms">
                                    <div class="flex items-center">
                                        <x-jet-checkbox name="terms" id="terms"/>
            
                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-jet-label>
                            </div>
                        @endif
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                                    {{ __('¿Ya estás registrado?') }}
                                </a>
                
                                <x-jet-button class="btn colorBoton ml-5 mt-3">
                                    {{ __('Register') }}
                                </x-jet-button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
    
    @endsection