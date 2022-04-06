@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de usuarios</div>

                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($usuarios as $usuario)
                            <li class="list-group-item">
                                <div>
                                    {{$usuario->id}} -     {{$usuario->name}} - {{$usuario->email}} - {{$usuario->role}}  - {{$usuario->capacidades}}
                                </div>
                                <div>
                                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-secondary" type="submit">Eliminar</button>
                                    </form>
                                    <br>
                                    <form action="{{route('usuarios.edit', $usuario)}}" method="GET">
                                        @csrf
                                        <button class="btn btn-secondary" type="submit">Editar</button>
                                    </form>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

