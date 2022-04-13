@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>


                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('You are logged in!') }}




                    @if (Auth::user()->role =="administrador")


                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('register') }}" >Registro de usuarios</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('usuarios.index') }}" >Listado de usuarios registrados</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('operarios.register') }}" >Registro de empresas de reformas</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tablones.register') }}" >Publicar anuncio</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tablones.index') }}" >Anuncios</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('notificaciones.register') }}" >Publicar notificaciones</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('notificaciones.index') }}" >Ver notificaciones del administrador</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tickets.register') }}" >Publicar incidencia</a></div>
                        <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tickets.index') }}">Ver incidencias</a></div>
                    @elseif  (Auth::user()->role =="operario")
                    <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tickets.index') }}" >Ver nincidencias</a></div>

                    @elseif(Auth::user()->role =="usuario")
                     <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tablones.register') }}" >Publicar anuncio</a></div>
                    <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tablones.index') }}" >Anuncios</a></div>
                      <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('notificaciones.index') }}" >Ver notificaciones del administrador</a></div>
                      <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tickets.register') }}" >Publicar incidencia</a></div>
                      <div> <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ route('tickets.index') }}" >Ver nincidencias</a></div>
                    @endif




                </div>
            </div>
        </div>
    </div>
</div>
@endsection
