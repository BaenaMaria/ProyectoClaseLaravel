@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Actualizar notificacion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('notificaciones.update', $notificacion->id) }}">
                        @csrf
                        @method('put')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Asunto') }}</label>

                            <div class="col-md-6">
                                <input value="{{$notificacion->title}}" id="title" type="text" class="form-control" name="title" required autocomplete="title" @error('title') is-invalid @enderror">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>



                        <div class="row mb-3">
                            <label for="notification" class="col-md-4 col-form-label text-md-end">{{ __('Notificación') }}</label>

                            <div class="col-md-6" >

                                <textarea id="notification" class="form-control @error('notification') is-invalid @enderror" name="notification" value="{{ old('notification') }}" placeholder="Escribe tu notificación,de máximo 255 caracteres" required autocomplete="anuncio" autofocus > {{$notificacion->notification}}</textarea></p>
                                @error('notification')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>
                            <div class="col-md-6">
                                <input  value="{{$notificacion->date}}" id="date" name='date' size="16" type="datetime-local" class="form-control" value="{{ date('Y-m-d\\TH:i') }}">


                            </div>
                        </div>



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




                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Publicar') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style type="text/css">
    textarea {
     background: url(http://i.stack.imgur.com/ynxjD.png) repeat-y;
     width: 600px;
     height: 300px;
     font: normal 14px verdana;
     line-height: 25px;
     padding: 2px 10px;
     border: solid 1px #ddd;
    }



    </style>


@endsection
