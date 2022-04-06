@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table class="table table-hover">
      <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>


            @foreach ($usuarios as $usuario)
            <tr>
            <td>{{$usuario->id}}</td>
            <td>{{$usuario->name}}</td>
            <td>{{$usuario->email}}</td>
            <td>{{$usuario->phone}}</td>
            <td>{{$usuario->role}}</td>
            <td>

                    <form action="{{route('usuarios.destroy', $usuario)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-secondary" type="submit">Eliminar</button>
                    </form>

                    <form action="{{route('usuarios.edit', $usuario)}}" method="GET">
                        @csrf
                        <button class="btn btn-secondary" type="submit">Editar</button>
                    </form>

            </td>

        @endforeach
    </tbody>
</table>


@endsection

