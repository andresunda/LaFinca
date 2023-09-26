@extends('layouts.layout')
@section('content')

<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Ventas</h1>
        <br>
<!------------------BLOQUE DEL BUSCADOR----------------->
        <div class="row">
            <div class="col-lg-12"> 
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre del cliente..." aria-label=".form-control-lg example">
            <br>
            </div>
        </div>
<!------------------------------------------------------>       
<div class="row">
    <div class="col-lg-8"> 
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Folio del pedido</th>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Descripcion del pedido</th>
                    <th scope="col">Total del pedido</th>
                    <th scope="col">Fecha de registro</th>
                <!--<th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>--->
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                    @include('pages.ventas')


              </tbody>
              </table>
        </div>
    </div>
    <div class="col-lg-4"> 
        <br>
        <h3 class="text-center">Generar Excell</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead class="text-center">
                  <tr>
                    <th scope="col">Dia</th>
                    <th scope="col">Semana</th>
                    <th scope="col">Mes</th>
                  </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <th scope="row"><button type="button" class="btn btn-success"><i class="fas fa-file-excel"></i></button></th>
                        <td><button type="button" class="btn btn-success"><i class="fas fa-file-excel"></i></button></td>
                        <td><button type="button" class="btn btn-success"><i class="fas fa-file-excel"></i></button></td>
                      </tr>
                </tbody>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

              </tbody>
              </table>
        </div>
    </div>

</div>

    

        <br>

        <!----AQUI VA EL PAGINADO: {$usuarios->render()}}---->

    </div>
</div> <!-----------AQUI CIERRA LA ETIQUETA DE LA CARTA BLANCA DE FONDO--->

<script>
    window.addEventListener('load', function(){
      document.getElementById("text").addEventListener("keyup", () => {
        if((document.getElementById("text").value.length)>=1)
        fetch(`/usuarios/search?text=${document.getElementById("text").value}`,{method:'get' })
        .then(response => response.text())
        .then(html => {document.getElementById("resultados").innerHTML = html })
        else
        document.getElementById("resultados").innerHTML = ""
      })
    });
  </script>

@endsection