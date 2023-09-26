@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Pedidos</h1>
        <br>
        <div class="row">
            <div class="col-lg-9">
                <input class="form-control form-control-lg" id="text" type="text" placeholder="Buscar por nombre..." aria-label=".form-control-lg example">
            <br>
            </div>
            <div class="col-lg-3">
                <div class="d-grid gap-2">
                    <a href="" class="btn btn-primary btn-lg"><i class="fa-solid fa-plus"></i> Agregar Cliente</a>
                </div>
            </div>
        </div>

        <!--<div style="min-height: 70px;">
             if
            <div class="alert alert-success  alert-dismissible fade show" role="alert">
                Se eliminó con éxito al usuario.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            endif
        </div>
          -->

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Id pedido</th>
                    <th scope="col">Id cliente</th>
                    <th scope="col">Nombre cliente</th>
                    <th scope="col">Descripcion del pedido</th>
                    <th scope="col">Tipo de consumo</th>
                    <th scope="col">Nota del pedido</th>
                    <th scope="col">Fecha de registro</th>
                    <th scope="col">Status del pedido</th>
                    <th scope="col">Imprimir Ticket</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>
                  </tr>
                </thead>
                <tbody id="resultados" class="table-group-divider">
                </tbody>
                <tbody class="table-group-divider">

                    @include('pages.pedidos')



              </tbody>
              </table>
        </div>

        <br>

        {{$pedidos->render()}}

    </div>
</div>

<script>
  window.addEventListener('load', function() {
      document.getElementById("text").addEventListener("keyup", () => {
          if ((document.getElementById("text").value.length) >= 1)
              fetch(`/clientes/search?text=${document.getElementById("text").value}`, {
                  method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                  document.getElementById("resultados").innerHTML = html
              })
          else
              document.getElementById("resultados").innerHTML = ""
      })
  });
</script>
@endsection
