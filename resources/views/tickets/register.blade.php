@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de incidencias') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!--UserId-->
                        <div class="row mb-3" hidden>
                            <label for="idUser" class="col-md-4 col-form-label text-md-end">{{ __('ID usuario') }}</label>

                            <div class="col-md-6">

                                <textarea id="idUser" class="form-control @error('idUser') is-invalid @enderror" name="idUser"autofocus>{{Auth::user()->id}}</textarea></p>
                                @error('idUser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <!--Tipo-->

                        <div class="row mb-3">
                            <label for="tipe" class="col-md-4 col-form-label text-md-end">Tipo de incidencia</label>
                            <div class="col-md-6">
                                <select name="tipe" id="role" class="form-select" required>

                                    <option value="null"></option>
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

                         <!--Descripcion-->
                        <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion de la incidencia') }}</label>

                        <div class="col-md-6">

                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Escribe la descripcion de la incidencia ,de máximo 255 caracteres" required autocomplete="anuncio" autofocus ></textarea></p>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                     <!--Status-->

                     <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end">Tipo de incidencia</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-select" required>

                                <option value="Abierta">Abierta</option>
                                <option value="Asignada" hidden>Asignada</option>
                                <option value="En curso" hidden>En curso</option>
                                <option value="Esperando respuesta" hidden>Esperando respuesta</option>
                                <option value="Cerrada resuelta" hidden>Cerrada resuelta</option>
                                <option value="Cerrada sin resolver" hidden>Cerrada sin resolver</option>



                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                     <!--photo-->
                     <div class="row mb-3" >
                        <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Adjunta foto de la incidencia') }}</label>
                        <div class="col-md-6">
                            <input id='photo'type="file" name="photo">


                        </div>
                    </div>

                        <!--dateIni-->
                        <div class="row mb-3" hidden>
                            <label for="dateIni" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de inicio') }}</label>
                            <div class="col-md-6">
                                <input id="dateIni" name='dateIni' size="16" type="datetime-local" class="form-control" value="{{ date('Y-m-d\\TH:i') }}">


                            </div>
                        </div>


                        <!--dateEnd-->
                        <div class="row mb-3" hidden>
                            <label for="dateEnd" class="col-md-4 col-form-label text-md-end">{{ __('Fecha final') }}</label>
                            <div class="col-md-6">
                                <input id="dateEnd" name='dateEnd' size="16" type="datetime-local" class="form-control" value="">


                            </div>
                        </div>




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
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
