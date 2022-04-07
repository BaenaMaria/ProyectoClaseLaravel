@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro de noticias') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tablones.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="anuncio" class="col-md-4 col-form-label text-md-end">{{ __('Anuncios') }}</label>

                            <div class="col-md-6">

                                <textarea id="anuncio" class="form-control @error('anuncio') is-invalid @enderror" name="anuncio" value="{{ old('anuncio') }}" placeholder="Escribe tu anuncio de máximo 255 caracteres" required autocomplete="anuncio" autofocus ></textarea></p>
                                @error('anuncio')
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
                        <div class="row mb-3" hidden>
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Fecha') }}</label>

                            <div class="col-md-6">

                                <div id="current_date"></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById("current_date").innerHTML = Date();
    </script>
@endsection
