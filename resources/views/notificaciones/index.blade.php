@extends('layouts.app')

@section('content')
<div class="table-responsive">
    <table  class="table table-hover" >
        <thead>

        </thead>
        <tbody>


            @foreach ($notificaciones as $notificacion)
            <tr>
            <td>
                <img  class="card-img-top" alt="Card image cap" src="/imagen/{{$notificacion->photo}}" />
                    <div class="card-body">
                        <h2 class="card-text">{{$notificacion->title}}</h2>
                        <h3 class="card-text">{{$notificacion->notification}}</h3>
                        <p class="card-text">{{$notificacion->date}}</p>
                        @if(Auth::user()->role=='administrador' )
                        <form action="{{route('notificaciones.destroy', $notificacion)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"class="btn btn-outline-danger type="submit">Eliminar</button>
                        </form>
                        <form action="{{route('notificaciones.edit', $notificacion)}}" method="GET">
                            @csrf
                            <button class="btn btn-outline-info" type="submit">Editar</button>
                        </form>
                        @endif
                    </div>
              </div>
            </td>


        @endforeach
    </tbody>
</table>


<input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>

<style type="text/css">
    textarea {
     background: url(http://i.stack.imgur.com/ynxjD.png) repeat-y;
     width: 600px;
     height: 300px;
     font: normal 14px verdana;
     line-height: 25px;
     padding: 2px 10px;
     border: solid 1px #ddd;
    }


    </style>




@endsection
