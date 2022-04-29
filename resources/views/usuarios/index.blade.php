@extends('layouts.app')

@section('content')

<!--ADMINISTRDOR-->
@if (Auth::user()->role == 'administrador')
    <div class="container py-5">
        <nav class="navbar navbar-light float-right">
            <form class="form-inline">
              <input name="buscarpor" class="form" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </nav>
        </div>
        <div class="row py-5"">
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive" >
                            <table id="sortTable" style="overflow-x:auto;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th onclick="sortTable(0)">Id</th>
                                        <th onclick="sortTable(1)">Nombre</th>
                                        <th onclick="sortTable(2)">Email</th>
                                        <th onclick="sortTable(3)">Teléfono</th>
                                        <th onclick="sortTable(4)">Rol</th>
                                        <th onclick="sortTable(5)">Tipo</th>
                                        <th onclick="sortTable(6)">Dirección</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->id }}</td>
                                            <td>{{ $usuario->name }}</td>
                                            <td>{{ $usuario->email }}</td>
                                            <td>{{ $usuario->phone }}</td>
                                            <td>{{ $usuario->role }}</td>
                                            <td>{{ $usuario->tipe }}</td>
                                            <td>{{ $usuario->adress }}</td>
                                            <td>

                                                <form class="formEliminar d-inline-block me-3"
                                                    action="{{ route('usuarios.destroy', $usuario) }}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button
                                                        onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"
                                                        class="btn btn-outline-danger" type="submit">Eliminar</button>
                                                </form>


                                                <form class="formEditar d-inline-block"
                                                    action="{{ route('usuarios.edit', $usuario) }}" method="GET">
                                                    @csrf
                                                    <button class="btn btn-outline-info " type="submit">Editar</button>
                                                </form>

                                            </td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>
@endif


<!--USUARIO-->
@if (Auth::user()->role == 'usuario')
    <div class="container py-5">
        <nav class="navbar navbar-light float-right">
            <form class="form-inline">
              <input name="buscarpor" class="form" type="search" placeholder="Buscar por nombre" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
          </nav>
        </div>
        <div class="row py-5"">
            <div class="col-lg-10 mx-auto">
                <div class="card rounded shadow border-0">
                    <div class="card-body p-5 bg-white rounded">
                        <div class="table-responsive" >
                            <table id="sortTable" style="overflow-x:auto;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th onclick="sortTable(0)">Id</th>
                                        <th onclick="sortTable(1)">Nombre</th>
                                        <th onclick="sortTable(2)">Email</th>
                                        <th onclick="sortTable(3)">Teléfono</th>
                                        <th onclick="sortTable(4)">Rol</th>
                                        <th onclick="sortTable(5)">Tipo</th>
                                        <th onclick="sortTable(6)">Dirección</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($usuarios as $usuario)
                                        @if ($usuario->role=='operario')
                                            <tr>
                                                <td>{{ $usuario->id }}</td>
                                                <td>{{ $usuario->name }}</td>
                                                <td>{{ $usuario->email }}</td>
                                                <td>{{ $usuario->phone }}</td>
                                                <td>{{ $usuario->role }}</td>
                                                <td>{{ $usuario->tipe }}</td>
                                                <td>{{ $usuario->adress }}</td>
                                                <td>

                                                    <form class="formEliminar d-inline-block me-3"
                                                        action="{{ route('usuarios.destroy', $usuario) }}" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button
                                                            onclick=" return confirm('¿Seguro que quieres eliminar este elemento?')"
                                                            class="btn btn-outline-danger" type="submit">Eliminar</button>
                                                    </form>


                                                    <form class="formEditar d-inline-block"
                                                        action="{{ route('usuarios.edit', $usuario) }}" method="GET">
                                                        @csrf
                                                        <button class="btn btn-outline-info " type="submit">Editar</button>
                                                    </form>

                                                </td>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type ='button' class="btn btn-primary"  value = 'Home' onclick="location.href = '{{ url('/home') }}'"/>
@endif


    <style>
        body {
            min-height: 100vh;

            background-color: white;
            background-image: linear-gradient(147deg, white 0%, white 100%);
        }

    </style>
 <script>
        $(function() {
            $(document).ready(function() {
                $('#example').DataTable();
            });
        });
 function sortTable(n) {
  var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
  table = document.getElementById("sortTable");
  switching = true;
  //Set the sorting direction to ascending:
  dir = "asc";
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[n];
      y = rows[i + 1].getElementsByTagName("TD")[n];
      /*check if the two rows should switch place,
      based on the direction, asc or desc:*/
      if (dir == "asc") {
        if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch= true;
          break;
        }
      } else if (dir == "desc") {
        if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
          //if so, mark as a switch and break the loop:
          shouldSwitch = true;
          break;
        }
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
      //Each time a switch is done, increase this count by 1:
      switchcount ++;
    } else {
      /*If no switching has been done AND the direction is "asc",
      set the direction to "desc" and run the while loop again.*/
      if (switchcount == 0 && dir == "asc") {
        dir = "desc";
        switching = true;
      }
    }
  }
}
</script>





@endsection
