@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar la incidencias') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                        @csrf
                        @method('put')

                         <!--Id-->

                         <div class="row mb-3">
                            <label for="Id" class="col-md-4 col-form-label text-md-end">{{ __('ID  ticket') }}</label>

                            <div class="col-md-6">
                                <input hidden id="id" type="text"
                                class="form-control @error('idUser') is-invalid @enderror"
                                name="id" placeholder="{{$ticket->id}}" value="{{$ticket->id}}"
                                required autocomplete="id" autofocus>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                          <!--UserId-->
                          <div class="row mb-3" >
                            <label for="idUser" class="col-md-4 col-form-label text-md-end">{{ __('ID usuario') }}</label>

                            <div class="col-md-6">

                                <input hidden value={{$ticket->idUser}} id="idUser"  name="idUser"  class="form-control">
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
                                <select name="tipe" id="tipe" class="form-select" required placeholder="{{$ticket->tipe}}" value="{{$ticket->tipe}}">

                                    <option value={{$ticket->tipe}}>{{$ticket->tipe}}</option>
                                    <option value="fontaneria">fontaneria</option>
                                    <option value="electricidad">electricidad</option>
                                    <option value="limpieza">limpieza</option>
                                    <option value="pintura">pintura</option>
                                    <option value="ascensores">ascensores</option>
                                    <option value="cristal">cristal</option>
                                    <option value="albañil">albañil</option>
                                    <option value="conserje">conserje</option>



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

                            <input  value={{ $ticket->description }} id="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus ></input></p>
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
                                <option value="Asignada" >Asignada</option>
                                <option value="En curso" >En curso</option>
                                <option value="Esperando respuesta" >Esperando respuesta</option>
                                <option value="Cerrada resuelta" >Cerrada resuelta</option>
                                <option value="Cerrada sin resolver">Cerrada sin resolver</option>



                            </select>

                            @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                        </div>
                    </div>
                        <!--photo-->
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">Foto</label>
                            <div class="col-md-6">
                                <img  class="card-img-top" alt="Card image cap" src="/imagen/{{$ticket->photo}}" />
                            </div>
                        </div>

                        <!--dateIni-->
                        <div class="row mb-3" >
                            <label for="dateIni" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de inicio') }}</label>
                            <div class="col-md-6">
                                <input id="dateIni"  name="dateIni" size="16"  class="form-control" value="{{$ticket->dateIni}}">


                            </div>
                        </div>


                        <!--dateEnd-->
                        <div class="row mb-3" >
                            <label for="dateEnd" class="col-md-4 col-form-label text-md-end">{{ __('Fecha final') }}</label>
                            <div class="col-md-6">
                                <input size="16" type="date" class="form-control" id="dateEnd"  value="">


                            </div>
                        </div>

                     <!--bill-->
                     <div class="row mb-3" >
                        <label for="bill" class="col-md-4 col-form-label text-md-end">{{ __('Foto de la factura si procede') }}</label>
                        <div class="col-md-6">
                            <input id='bill'type="file" name="bill">


                        </div>
                    </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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
