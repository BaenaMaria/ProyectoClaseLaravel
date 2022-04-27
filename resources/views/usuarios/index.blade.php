@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table  class="table table-hover" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Tipo</th>
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
            <td>{{$usuario->tipe}}</td>
            <td>

                    <form class="formEliminar"action="{{route('usuarios.destroy', $usuario)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"class="btn btn-outline-danger type="submit">Eliminar</button>
                    </form>
                    <br>

                    <form action="{{route('usuarios.edit', $usuario)}}" method="GET">
                        @csrf
                        <button class="btn btn-outline-info" type="submit">Editar</button>
                    </form>

            </td>

        @endforeach
<style>
@endsection




