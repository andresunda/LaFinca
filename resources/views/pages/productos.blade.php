@if (count($productos))
@foreach ($productos as $producto)

<tr>
  @if (is_array($producto))
  @php
      $producto = new App\Models\Articulo($producto);
  @endphp
@endif
    <th scope="row">{{$producto->id}}</th>
    <td>{{$producto->nombre_producto}}</td>
    <td>{{$producto->descripcion}}</td>
    <td>{{$producto->categoria->categoria_producto ?? 'N/A'}}</td>
    <td>${{$producto->precio->precio_chica ?? 'N/A'}}</td>
    <td>
      @if($producto->categoria->categoria_producto == "pepitos")
      .
  @elseif($producto->categoria->categoria_producto == "otros")
      .
  @else
      ${{$producto->precio->precio_grande ?? 'N/A'}}
  @endif
    </td>
    <td><img style="width:120px;" src="{{ asset('storage/' . $producto->img) }}" alt="Card image cap"></td>
    <td>{{$producto->created_at}}</td>

    <td>
      <div class="d-grid gap-2">
          <!-- Button trigger modal -->
<button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal" data-bs-target="#modificarModal1{{$producto->id}}">
<i class="fa-solid fa-pen-to-square"></i>  </button>

<!-- Modal -->
<div class="modal fade" id="modificarModal1{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body">
          <div class="card card-content shadow-sm">
              <div class="card-body">
                  <h1 >Modificar producto</h1>
                  <br>
                  <br>
                  
                  <form action="{{route('modificarProducto')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$producto->id}}">
    
       <div class="mb-3">
                        <label class="form-label">Img</label>
                        <input type="file" class="form-control form-control-lg" value="@if(!old('img')){{$producto->img}}@endif{{old('img')}}" name="img">
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">Nombre/Especialidad del producto</label>
                        <input type="text" class="form-control form-control-lg" value="@if(!old('nombre_producto')){{$producto->nombre_producto}}@endif{{old('nombre_producto')}}" name="nombre_producto">
                    </div>
    
    
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control form-control-lg" value="@if(!old('descripcion')){{$producto->descripcion}}@endif{{old('descripcion')}}" name="descripcion">
                    </div>
    
                    <label class="form-label">Categoria del producto</label>
                    <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="categoria_producto" required>
                        <option value="pizzas">Pizzas</option>
                        <option value="pepitos">Pepitos</option>
                        <option value="otros">Otros</option>
                      </select>
    
    
                    
    
                    <div class="mb-3">
                        <label class="form-label">Precio chica</label>
                        <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('precio_chica')){{$producto->precio->precio_chica}}@endif{{old('precio_chica')}}" name="precio_chica">
    
                    </div>
    
                    <div class="mb-3">
                        <label class="form-label">Precio grande</label>
                        <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('precio_grande')){{$producto->precio->precio_grande}}@endif{{old('precio_grande')}}" name="precio_grande">
    
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
        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{$producto->id}}" class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
        </div>
    </td>

  </tr>

@endforeach


<br>

@foreach ($productos as $producto)
{{-- Modal --}}
<div class="modal fade" id="exampleModal{{$producto->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar producto</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ¿Estas seguro de eliminar el producto {{$producto->nombre_producto}}?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <a href="{{route('eliminarProducto',$producto->id)}}" class="btn btn-danger fa-beat">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
@endforeach
@endif
