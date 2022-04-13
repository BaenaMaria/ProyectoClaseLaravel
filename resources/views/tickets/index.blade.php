@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table  class="table table-hover" >
        <thead>

        </thead>
        <tbody>


            @foreach ($tickets as $ticket)
            <tr>
                <td>
                <div class="container">
                    <div class="row ">
                        <div class="card" style="width: 18rem;">

                            <img  class="card-img-top" alt="Card image cap" src="/imagen/{{$ticket->photo}}" />
                            <div class="card-body">
                                <h2 class="card-text">{{$ticket->tipe}}</h2>
                                <h3 class="card-text">{{$ticket->description}}</h3>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">Estasdo: {{$ticket->status}}</li>
                                    <li class="list-group-item">Fecha de inicio: {{$ticket->dateIni}}</li>
                                    <li class="list-group-item">Fecha fin:{{$ticket->dateEnd}}</li>
                                </ul>

                                @if(Auth::user()->role=='administrador'||Auth::user()->id==$ticket->idUser)
                                <form action="{{route('tickets.destroy', $ticket)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"class="btn btn-outline-danger type="submit">Eliminar</button>

                                </form>
                                <form action="{{route('tickets.edit', $ticket)}}" method="GET">
                                    @csrf
                                    <br>
                                    <button class="btn btn-outline-info" type="submit">Editar</button>
                                </form>
                                @endif
                            </div>
                    </div>
                </div>
            </td>
        <tr>

        @endforeach
    </tbody>
</table>


<input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>

<style type="text/css">

 </style>




@endsection
