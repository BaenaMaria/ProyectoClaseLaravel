
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ ('Actualizar la incidencias') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('tickets.update', $ticket->id) }}">
                            @csrf
                            @method('put')

                            <!--Id-->

                            <div class="row mb-3">
                                <label for="Id" class="col-md-4 col-form-label text-md-end">{{ ('ID  ticket') }}</label>

                                <div class="col-md-6">
                                    <label for="Id" class="col-md-4 col-form-label text-md-end">{{ $ticket->id }}</label>
                                    <input hidden id="id" type="text"
                                        class="form-control @error('idUser') is-invalid @enderror" name="id"
                                        placeholder="{{ $ticket->id }}" value="{{ $ticket->id }}" required
                                        autocomplete="id" autofocus>

                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!--UserId-->
                            <div class="row mb-3">
                                <label for="idUser"
                                    class="col-md-4 col-form-label text-md-end">{{ ('ID usuario') }}</label>

                                <div class="col-md-6">
                                    <label for="idUser"
                                        class="col-md-4 col-form-label text-md-end">{{ $ticket->idUser }}</label>
                                    <input hidden value={{ $ticket->idUser }} id="idUser" name="idUser"
                                        class="form-control">
                                    @error('idUser')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!--Tipo-->

                            <div class="row mb-3">
                                <label for="tipe" class="col-md-4 col-form-label text-md-end">Tipo de incidencia</label>
                                <div class="col-md-6">
                                    <label for="tipe"
                                        class="col-md-4 col-form-label text-md-end">{{ $ticket->tipe }}</label>
                                </div>
                                <div class="col-md-6" hidden>
                                    <select hidden name="tipe" id="tipe" class="form-select" required
                                        placeholder="{{ $ticket->tipe }}" value="{{ $ticket->tipe }}">

                                        <option value={{ $ticket->tipe }}>{{ $ticket->tipe }}</option>




                                    </select>

                                    @error('tipe')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <!--Descripcion-->
                            <div class="row mb-3">
                                <label for="description" class="col-md-4 col-form-label text-md-end">{{ ('Descripcion de la incidencia') }}</label>

                                <div class="col-md-6">
                                    <label for="description"
                                        class="col-md-4 col-form-label text-md-end">{{ $ticket->description }}</label>
                                    <input hidden value={{ $ticket->description }} id="description"
                                        class="form-control @error('description') is-invalid @enderror" name="description"
                                        value="{{ old('description') }}" required autocomplete="description"
                                        autofocus></input></p>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!--Status-->

                            <div class="row mb-3">
                                <label for="status" class="col-md-4 col-form-label text-md-end">Tipo de incidencia</label>
                                <div class="col-md-6">
                                    <select name="status" id="status" class="form-select" required onchange="showInp()" onclick="statusClose()">

                                        <option value="Abierta">Abierta</option>
                                        <option value="En curso">En curso</option>
                                        <option value="Cerrada">Cerrada</option>
                                    </select>

                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <!--photo-->
                            <div class="row mb-3">
                                <label for="photo" class="col-md-4 col-form-label text-md-end">Foto</label>
                                <div class="col-md-6">
                                    <img class="card-img-top" alt="Card image cap" src="/{{ $ticket->photo }}" />
                                </div>
                            </div>

                            <!--dateIni-->
                            <div class="row mb-3">
                                <label id=label0 for="dateIni"
                                    class="col-md-4 col-form-label text-md-end">{{ ('Fecha de inicio') }}</label>
                                <div class="col-md-6">
                                    <label for="dateIni"
                                        class="col-md-4 col-form-label text-md-end">{{ $ticket->dateIni }}</label>
                                    <input hidden id="dateIni" name="dateIni" size="16" class="form-control"
                                        value="{{ $ticket->dateIni }}">


                                </div>
                            </div>


                            <!--dateEnd-->
                            <div class="div1 row mb-3" id="divDateEnd">
                                <label id=label1 for="dateEnd"
                                    class="col-md-4 col-form-label text-md-end">{{ ('Fecha final') }}</label>
                                <div class="col-md-6">
                                    <input size="16" type="date" class="form-control" id="dateEnd" value="" name="dateEnd" >
                                </div>
                            </div>



<!--bill-->
                            <div class="div1 row mb-3" id="divBill">
                                <label id=label1 for="bill"
                                    class="col-md-4 col-form-label text-md-end">{{ ('Foto de la factura si procede') }}</label>
                                <div class="col-md-6">
                                    <input id='bill'  type="file" name="bill">


                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ ('Actualizar') }}
                                    </button>
                                </div>
                            </div>
                            <br>

                            <p>*Si se cierra una incidencia, no se podrá realizar ningún cambio en ella.</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script>
        function showInp() {
            var getSelectValue = document.getElementById("status").value;

            if (getSelectValue == "cerrada") {
                document.getElementById("andphone").style.display = "inline-block";
            }

            var close = document.getElementById("status").value;
            var dateEnd = document.getElementById("divDateEnd");
            var bill = document.getElementById("divBill");

            dateEnd.style.visibility = "hidden";
            bill.style.visibility = "hidden";

            if(close != "Cerrada"){
                dateEnd.style.visibility = "hidden";
                bill.style.visibility = "hidden";
            }else{
                dateEnd.style.visibility = "visible";
                bill.style.visibility = "visible";
            }

        }
    </script>
    <style>
        .div1{
            visibility: hidden;
        }
    </style>
@endsection
