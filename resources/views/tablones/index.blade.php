@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table  class="table table-hover" >
        <thead>
            <tr>

                <th>Título</th>
                <th>Anuncio</th>
                <th>idUser</th>




            </tr>
        </thead>
        <tbody>


            @foreach ($tablones as $tablon)
            <tr>
            <td>{{$tablon->title}}</td>
            <td>{{$tablon->anuncio}}</td>
            <td>{{$tablon->idUser}}</td>


            <td>
                    @if($tablon->userId == Auth::user()->id||Auth::user()->role=='administrador' )

                        <form action="{{route('tablones.destroy', $tablon)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                        </form>



                    @endif







            </td>



        @endforeach
    </tbody>
</table>




@endsection
