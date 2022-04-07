@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table  class="table table-hover" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha de publicación</th>
                <th>Anuncio</th>



            </tr>
        </thead>
        <tbody>


            @foreach ($tablones as $tablon)
            <tr>
            <td>{{$tablon->id}}</td>
            <td>{{$tablon->date}}</td>
            <td>{{$tablon->anuncio}}</td>

            <td>
                    @if($tablon->userId ==$user->id)
                    {
                        <form action="{{route('tablones.destroy', $tablon)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Eliminar</button>
                        </form>
                    }
                    @else{

                    @endif







            </td>

        @endforeach
    </tbody>
</table>




@endsection
