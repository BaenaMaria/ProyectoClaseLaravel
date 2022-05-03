
             @extends('layouts.app')

             @section('content')

             <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
             <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
             <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
             <h1>Incidencias</h1>
             <hr>


                 @foreach ($tickets as $ticket)

            <!--OPERARIO-->
                        @if ( Auth::user()->role=='operario' && $ticket->tipe==Auth::user()->tipe)
                        <div class="row">
                            <div class="col-sm-4 py-2">
                                <div class="card card-body h-100">
                                    GESCONVES tu administrador de confianza
                                    <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
                                </div>
                            </div>

                            <div class="col-sm-4 py-2">
                                <div class="card h-100 border-primary">
                                    <div class="card-body">

                                         <h3 class="card-title">{{$ticket->id}}-{{$ticket->tipe}}</h3>
                                         <img src="/{{$ticket->photo}}" width="300" height="300">
                                         <small class="card-title">Fecha inicio {{$ticket->dateIni}}</small>
                                         <br>
                                         <small class="card-title">Usuario creador de la incidencia-{{$ticket->idUser}}</small>
                                         <div>Estado {{$ticket->status}}</div>
                                         @if ($ticket->status=='cerrada'|| $ticket->status=="Cerrada")
                                         <small class="card-title">Fecha fin {{$ticket->dateEnd}}</small>
                                         @endif

                                         <hr>
                                         <textarea readonly class="card-text">{{$ticket->description}}</textarea>


                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 py-2">
                                <div class="card card-body h-100">
                                    GESCONVES tu administrador de confianza
                                    <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
                                </div>
                            </div>
                        </div>
                        @endif



             @endforeach

             @foreach ($tickets as $ticket)

              <!--ADMINISTRADOR Y USUARIO-->

             @if (Auth::user()->tipe=="nada"||Auth::user()->role=='administrador' ||Auth::user()->role=='usuario')
                     <div class="row">
                        <div class="col-sm-4 py-2">
                            <div class="card card-body h-100">
                                GESCONVES tu administrador de confianza
                                <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
                            </div>
                        </div>

                        <div class="col-sm-4 py-2">
                            <div class="card h-100 border-primary">
                                <div class="card-body">

                                     <h3 class="card-title">{{$ticket->id}}-{{$ticket->tipe}}</h3>
                                     <img src="/{{$ticket->photo}}" width="300" height="300">
                                     <small class="card-title">Fecha inicio {{$ticket->dateIni}}</small>
                                     <br>
                                     <small class="card-title">Usuario creador de la incidencia-{{$ticket->idUser}}</small>
                                     <div>Estado {{$ticket->status}}</div>
                                     @if ($ticket->status=='cerrada'|| $ticket->status=="Cerrada")
                                     <small class="card-title">Fecha fin {{$ticket->dateEnd}}</small>
                                     @endif

                                     <hr>
                                     <textarea readonly class="card-text">{{$ticket->description}}</textarea>
                                @if(Auth::user()->role=='administrador')

                                    <br>
                                    @if ($ticket->status != 'cerrada')
                                        <form class="formEliminar d-inline-block me-3" action="{{ route('tickets.destroy', $ticket) }}" method="POST">
                                            @csrf
                                            @method('delete')


                                            <button
                                                onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"
                                                class="btn btn-outline-danger" type="
                                                submit">Eliminar</button>

                                        </form>

                                        <form class="formEditar d-inline-block"
                                        action="{{ route('tickets.edit', $ticket) }}" method="GET">
                                        @csrf
                                            <button class="btn btn-outline-info " type="submit">Editar</button>
                                        </form>
                                    @endif

                                @endif


                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 py-2">
                            <div class="card card-body h-100">
                                GESCONVES tu administrador de confianza
                                <img  src="/imagen/logo.PNG"  class="circular--square" alt="" width="100" height="100"  >
                            </div>
                        </div>
                    </div>
                    @endif


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
             img
             {
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
