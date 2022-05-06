@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h1>Notificaciones del administrador</h1>
<hr>
@foreach ($notificaciones as $notificacion)
<div class="container">
    <div class="row">
        <div class="col-sm-4 py-2">
            <div class="card card-body h-100">
                gescomveS tu administrador de confianza
                <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
            </div>
        </div>

        <div class="col-sm-4 py-2">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h3 class="card-title">{{$notificacion->title}}</h3>
                    <small class="card-title">{{$notificacion->date}}</small>
                    <hr>
                    <textarea readonly class="card-text">{{$notificacion->notification}}</textarea>
                    @if(Auth::user()->role=='administrador')

            <br>
                    <form class="formEliminar d-inline-block  float-right"
                    action="{{ route('notificaciones.destroy', $notificacion) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button
                        onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"
                        class="btn btn-outline-danger " type="submit">Eliminar</button>
                </form>


                <form class="formEditar d-inline-block"
                    action="{{ route('notificaciones.edit', $notificacion) }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-info " type="submit">Editar</button>
                </form>
                @endif







                </div>
            </div>
        </div>
        <div class="col-sm-4 py-2">
            <div class="card card-body h-100">
                gescomveS tu administrador de confianza
                <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
            </div>
        </div>
    </div>
</div>
@endforeach
<input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>
<script>
    let area = document.querySelectorAll(".cajas-texto")

    window.addEventListener("DOMContentLoaded", () => {
      area.forEach((elemento) => {
        elemento.style.height = `${elemento.scrollHeight}px`
      })
    })
</script>
<style>
textarea{
  overflow:hidden;
  display:block;
  height:auto;
  color: #5891ff;
  width:100%;
  height:150px;
  padding:15px;
  border: 1px solid #5891ff;
}

    .circular--square {
  border-radius: 50%;
  display:block;
    margin:auto;

}
h1{
    color: #5891ff;
        text-align: center;
        text-transform: capitalize;

}
    h3{
        color: #5891ff;
        text-align: center;
        text-transform: capitalize;
    }
    p{
        color: #5891ff;
        text-align: center;
    }

    .linea
{
    display: inline-block;
}


</style>

@endsection
