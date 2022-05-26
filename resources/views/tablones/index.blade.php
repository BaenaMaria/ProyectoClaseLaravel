@extends('layouts.app')

@section('content')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<h1>Tus anuncios</h1>
<hr>
@foreach ($tablones as $tablon)
<div class="container">
    <div class="row">
        <div class="col-sm-4 py-2">
            <div class="card card-body h-100">
                GESCOMVES tu administrador de confianza
                <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
            </div>
        </div>

        <div class="col-sm-4 py-2">
            <div class="card h-100 border-primary">
                <div class="card-body">
                    <h3 class="card-title">{{$tablon->title}} del usuario {{$tablon->idUser}}</h3>
                    <hr>
                    <textarea readonly class="card-text">{{$tablon->anuncio}}</textarea>
                    @if($tablon->idUser == Auth::user()->id||Auth::user()->role=='administrador')


                    <br>
                    <form action="{{route('tablones.destroy', $tablon)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"class="btn btn-outline-danger type="submit">Eliminar</button>
                    </form>

                         @endif


                </div>
            </div>
        </div>
        <div class="col-sm-4 py-2">
            <div class="card card-body h-100">
                GESCOMVES tu administrador de confianza
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
    inline-buttons .et_pb_button_module_wrapper {
    display: inline-block;
    margin: 0 10px;
}

button{ transform: translateX(280%); }
</style>

@endsection
