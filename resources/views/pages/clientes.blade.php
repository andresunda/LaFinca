@if (count($clientes))
@foreach ($clientes as $cliente)

<tr>
    <th scope="row">{{$cliente->id}}</th>
    <td>{{$cliente->nombre}}</td>
    <td>{{$cliente->apellido_paterno}}</td>
    <td>{{$cliente->apellido_materno}}</td>
    <td>{{$cliente->teléfono}}</td>
<!----------------------------------------------Columna de crear pedido------------------------------------------------->
    <td class="">
      <div class="text-center">
      <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal" data-bs-target="#modal2">
        <i class="fas fa-pencil-alt"></i>
      </div>
      </button>
    
      <!-- Modal -->
      <div class="modal fade" id="modal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
    
            <div class="modal-body">
                <div class="card card-content shadow-sm">
                    <div class="card-body">
                        <h1 class="text-center">Crear pedido</h1>
    
                        @livewire('formulario-crear-pedido' , ['cliente' => $cliente])

                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </td>

<!---------------------------------------------------------------------------------------------------------------------->

    <td>
      <div class="d-grid gap-2">
      <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modificarModal{{$cliente->id}}">
        <i class="fa-solid fa-pen-to-square"></i>  </button>
        
          <!-- Modal -->
          <div class="modal fade" id="modificarModal{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
        
                <div class="modal-body">
                    <div class="card card-content shadow-sm">
                        <div class="card-body">
                            <h1 >Modificar usuario</h1>
                            <br>
                            <br>
                            
                            <form action="{{route('modificarCliente')}}" method="POST">
                              @csrf
              
                              <div class="mb-3">
                                  <label class="form-label">Nombre del cliente</label>
                                  <input type="text" class="form-control form-control-lg" value="@if(!old('nombre')){{$cliente->nombre}}@endif{{old('nombre')}}" name="nombre">
                              </div>
              
                              <div class="mb-3">
                                  <label class="form-label">Apellido paterno</label>
                                  <input type="text" class="form-control form-control-lg" value="@if(!old('apellido_paterno')){{$cliente->apellido_paterno}}@endif{{old('apellido_paterno')}}" name="apellido_paterno">
                              </div>
              
                              <div class="mb-3">
                                  <label class="form-label">Apellido Materno</label>
                                  <input type="text" class="form-control form-control-lg" value="@if(!old('apellido_materno')){{$cliente->apellido_materno}}@endif{{old('apellido_materno')}}" name="apellido_materno">
                              </div>
              
                              <input type="hidden" name="id" value="{{$cliente->id}}">
              
                              <div class="mb-3">
                                  <label class="form-label">Teléfono</label>
                                  <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('teléfono')){{$cliente->teléfono}}@endif{{old('teléfono')}}" name="teléfono">
              
                              </div>
              
              
              
                              <br>
                              <div class="d-grid gap-2">
                                  <button type="submit" class="btn btn-primary btn-lg">Guardar cambios</button>
                              </div>
                          </form>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </td>
    <td>
        <div class="d-grid gap-2">
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$cliente->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>

  </tr>

@endforeach


<br>

@foreach ($clientes as $cliente)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$cliente->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar cliente</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar al cliente {{$cliente->nombre}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarCliente', $cliente->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif
