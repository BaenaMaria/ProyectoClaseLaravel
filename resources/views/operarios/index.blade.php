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
                <th>Acciones</th>

            </tr>
        </thead>
        <tbody>


            @foreach ($operarios as $operario)
            <tr>
            <td>{{$operario->id}}</td>
            <td>{{$operario->name}}</td>
            <td>{{$operario->email}}</td>
            <td>{{$operario->phone}}</td>
            <td>{{$operario->role}}</td>
            <td>

                    <form action="{{route('operarios.destroy', $operario)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger type="submit">Eliminar</button>
                    </form>
                    <br>

                    <form action="{{route('operarios.edit', $operario)}}" method="GET">
                        @csrf
                        <button class="btn btn-outline-info" type="submit">Editar</button>
                    </form>

            </td>

        @endforeach
    </tbody>
</table>




@endsection

