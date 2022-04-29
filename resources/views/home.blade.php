@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <!--ADMINISTRADOR-->

                @if (Auth::user()->role == 'administrador')

                    <nav class="accordion arrows">
                        <header class="box">
                            <label for="acc-close" class="box-title">Opciones</label>
                        </header>
                        <input type="radio" name="accordion" id="cb1" />
                        <section class="box">
                            <label class="box-title" for="cb1">Usuarios</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('register') }}">Registro de
                                    usuarios</a></div>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('usuarios.index') }}">Listado
                                    de usuarios registrados</a></div>
                        </section>
                        <input type="radio" name="accordion" id="cb2" />
                        <section class="box">
                            <label class="box-title" for="cb2">Anuncios</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tablones.register') }}">Publicar anuncio</a></div><br>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tablones.index') }}">Anuncios</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="cb3" />
                        <section class="box">
                            <label class="box-title" for="cb3">Notificaciones</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('notificaciones.register') }}">Publicar notificaciones</a>
                            </div><br>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('notificaciones.index') }}">Ver notificaciones del
                                    administrador</a>
                            </div><br>
                        </section>
                        <input type="radio" name="accordion" id="cb4" />
                        <section class="box">
                            <label class="box-title" for="cb4">Incidencias</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tickets.register') }}">Publicar incidencia</a></div><br>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tickets.index') }}">Ver
                                    incidencias</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="acc-close" />
                    </nav>
                    <br>
                    <!--COUNTER-->



                    <!--OPERARIO-->
                @elseif (Auth::user()->role == 'operario')
                    <nav class="accordion arrows">
                        <header class="box">
                            <label for="acc-close" class="box-title">Opciones</label>
                        </header>
                        <input type="radio" name="accordion" id="cb5" />
                        <section class="box">
                            <label class="box-title" for="cb5">Incidencias</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tickets.index') }}">Ver
                                    incidencias</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="acc-close" />
                    </nav>
                     <!--USUARIO-->
                @elseif(Auth::user()->role == 'usuario')
                    <nav class="accordion arrows">
                        <header class="box">
                            <label for="acc-close" class="box-title">Opciones</label>
                        </header>
                        <input type="radio" name="accordion" id="cb1" />
                        <section class="box">
                            <label class="box-title" for="cb1">Usuarios</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('usuarios.index') }}">Listado
                                    de usuarios registrados</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="cb6" />
                        <section class="box">
                            <label class="box-title" for="cb6">Anuncios</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tablones.register') }}">Publicar anuncio</a></div><br>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tablones.index') }}">Anuncios</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="cb7" />
                        <section class="box">
                            <label class="box-title" for="cb7">Notificaciones</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('notificaciones.index') }}">Ver notificaciones del
                                    administrador</a>
                            </div><br>
                        </section>
                        <input type="radio" name="accordion" id="cb8" />
                        <section class="box">
                            <label class="box-title" for="cb8">Incidencias</label>
                            <label class="box-close" for="acc-close"></label>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tickets.register') }}">Publicar incidencia</a></div><br>
                            <div class="box-content"> <a class="btn btn-outline-primary"
                                    href="{{ route('tickets.index') }}">Ver
                                    incidencias</a></div><br>
                        </section>
                        <input type="radio" name="accordion" id="acc-close" />
                    </nav>
                @endif
            </div>
        </div>
    </div>

    <style>
        body {
            height: calc(100% - 20px);
            width: calc(100% - 20px);
            margin: 0;
            padding: 10px;
            display: flex;
            background: #f2f2f2;
            color: rgba(0, 0, 0, .87);
            font-family: 'Roboto', sans-serif;
        }

        .accordion {
            margin: auto;
            width: 1000px;
        }

        .accordion input {
            display: none;
        }

        .box {
            position: relative;
            background: white;
            height: 64px;
            transition: all .15s ease-in-out;
        }

        .box::before {
            content: '';
            position: absolute;
            display: block;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            pointer-events: none;
            box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px rgba(0, 0, 0, .12), 0 2px 4px rgba(0, 0, 0, .24);
        }

        header.box {
            background: #5891ff;
            z-index: 100;
            cursor: initial;
            box-shadow: 0 -1px 0 #e5e5e5, 0 0 2px -2px rgba(0, 0, 0, .12), 0 2px 4px -4px rgba(0, 0, 0, .24);
        }

        header .box-title {
            margin: 0;
            font-weight: normal;
            font-size: 16pt;
            color: white;
            cursor: initial;
        }

        .box-title {
            width: calc(100% - 40px);
            height: 64px;
            line-height: 64px;
            padding: 0 20px;
            display: inline-block;
            cursor: pointer;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .box-content {
            width: calc(100% - 40px);
            padding: 30px 20px;
            font-size: 11pt;
            color: rgba(0, 0, 0, .54);
            display: none;
        }

        .box-close {
            position: absolute;
            height: 64px;
            width: 100%;
            top: 0;
            left: 0;
            cursor: pointer;
            display: none;
        }

        input:checked+.box {
            height: auto;
            margin: 16px 0;
            box-shadow: 0 0 6px rgba(0, 0, 0, .16), 0 6px 12px rgba(0, 0, 0, .32);
        }

        input:checked+.box .box-title {
            border-bottom: 1px solid rgba(0, 0, 0, .18);
        }

        input:checked+.box .box-content,
        input:checked+.box .box-close {
            display: inline-block;
        }

        .arrows section .box-title {
            padding-left: 44px;
            width: calc(100% - 64px);
        }

        .arrows section .box-title:before {
            position: absolute;
            display: block;
            content: '\203a';
            font-size: 18pt;
            left: 20px;
            top: -2px;
            transition: transform .15s ease-in-out;
            color: rgba(0, 0, 0, .54);
        }

        input:checked+section.box .box-title:before {
            transform: rotate(90deg);
        }



    </style>

<script>

</script>


@endsection
