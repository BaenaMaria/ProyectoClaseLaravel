@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('put')

                        <!--ID-->
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="number"
                                    class="form-control" disabled
                                    name="id" value="{{$usuario->id}}"
                                    required autocomplete="id" autofocus>

                                </div>
                         </div>

                        <!--NAME-->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="{{$usuario->name}}" value="{{$usuario->name}}"
                                required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--PHONE-->
                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">{{ __('Telefono') }}</label>

                            <div class="col-md-6">
                                <input pattern="\[0-9]{9}" id="phone" type="tel"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{$usuario->phone}}" placeholder="{{$usuario->phone}}" required autocomplete="phone" autofocus>

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!--EMAIL-->
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{$usuario->email}}" placeholder="{{$usuario->email}}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--PASSWORD-->
                        <div class="row mb-3" hidden>
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$usuario->password}}" placeholder="{{$usuario->password}}"required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <!--ROLE-->
                         <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                <select name="role" id="role" class="form-select" required>

                                    <option value="usuario">Usuario</option>
                                    <option value="administrador">Administrador</option>
                                    <option value="operario">Operario</option>

                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="tipe" id ='labelO'class="col-md-4 col-form-label text-md-end">Tipo de operario</label>
                            <div class="col-md-6">
                                <select name="tipe" id="tipe" class="form-select" required>

                                    <option value="nada">No es empresa</option>
                                    <option value="fontaneria">Fontanería</option>
                                    <option value="electricidad">Electricidad</option>
                                    <option value="limpieza">Limpieza</option>
                                    <option value="pintura">Pintura</option>
                                    <option value="ascensores">Ascensores</option>
                                    <option value="cristal">Cristal</option>
                                    <option value="albañil">Albañil</option>
                                    <option value="conserje">Conserje</option>



                                </select>

                                @error('tipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <!--Dirreccion-->

                        <div class="row mb-3">
                            <label id ='label1' for="adress" class="col-md-4 col-form-label text-md-end">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="adress" class="form-control @error('adress') is-invalid @enderror" name="adress" value="{{ old('adress') }}" autocomplete="adress" placeholder="Calle Ejemplo 1 110000">

                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br>
<br>
<br>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Editar usuario') }}
                                </button>
                                <input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        var role = document.getElementById("role");
        var tipe = document.getElementById("tipe");
        var labelO = document.getElementById("labelO");
        var adress = document.getElementById("adress");
        var label1 = document.getElementById("label1");

        role.addEventListener("change", valideRole, false);
        tipe.style.visibility = "hidden";
        labelO.style.visibility = "hidden";
        adress.style.visibility = "hidden";
        label1.style.visibility = "hidden";

        function valideRole() {
            if (role.value == "operario") {
                tipe.style.visibility = "visible";
                labelO.style.visibility = "visible";
                adress.style.visibility = "visible";
                label1.style.visibility = "visible";
            }
            if (role.value != "operario") {
                tipe.style.visibility = "hidden";
                labelO.style.visibility = "hidden";
                tipe.value = "nada";
                adress.style.visibility = "hidden";
                label1.style.visibility = "hidden";
            }
        }
    </script>
@endsection
