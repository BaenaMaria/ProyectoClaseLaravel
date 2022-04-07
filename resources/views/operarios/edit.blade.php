@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('operarios.update', $operario->id) }}">
                        @csrf
                        @method('put')

                        <!--ID-->
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>

                                <div class="col-md-6">
                                    <input id="id" type="number"
                                    class="form-control" disabled
                                    name="id" value="{{$operario->id}}"
                                    required autocomplete="id" autofocus>

                                </div>
                         </div>

                        <!--NAME-->
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="{{$operario->name}}" value="{{$operario->name}}"
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
                                    value="{{$operario->phone}}" placeholder="{{$operario->phone}}" required autocomplete="phone" autofocus>

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
                                name="email" value="{{$operario->email}}" placeholder="{{$operario->email}}" required autocomplete="email">

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
                                <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$operario->password}}" placeholder="{{$operario->password}}"required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--TIPE-->
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">Roles</label>
                            <div class="col-md-6">
                                <select name="tipe" id="role" class="form-select" required>

                                    <option value="Fontanería">Fontanería</option>
                                    <option value="Electricidad">Electricidad</option>
                                    <option value="Limpieza">Limpieza</option>
                                    <option value="Pintura">Pintura</option>
                                    <option value="Ascensores">Ascensores</option>
                                    <option value="Cristal">Cristal</option>
                                    <option value="Albañil">Albañil</option>
                                    <option value="Conserje">Conserje</option>



                                </select>

                                @error('tipe')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button name="btnEditar" id="btnEditar" type="submit" class="btn btn-primary">
                                    Actualizar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
