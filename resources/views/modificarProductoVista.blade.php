@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Modificar producto</h1>
            <br>
            <br>
            <div style="min-height: 70px;">
            @if (Session::has('mensaje'))
                <div class="alert alert-success  alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
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
                <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="tipo_producto" required>
                    <option value="pizzas">Pizzas</option>
                    <option value="pepitos">Pepitos</option>
                    <option value="pastas">Pastas</option>
                    <option value="extras">Extras</option>
                  </select>


                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('precio')){{$producto->precio}}@endif{{old('precio')}}" name="precio">

                </div>

                <div class="mb-3">
                    <label class="form-label">Precio chica</label>
                    <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('precio_chica')){{$producto->precio_chica}}@endif{{old('precio_chica')}}" name="precio_chica">

                </div>

                <div class="mb-3">
                    <label class="form-label">Precio grande</label>
                    <input type="number" maxlength="10" class="form-control form-control-lg" value="@if(!old('precio_grande')){{$producto->precio_grande}}@endif{{old('precio_grande')}}" name="precio_grande">

                </div>


                <br>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar cambios</button>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection
