@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Agregar producto</h1>
        <br>
        <br>
        <div style="min-height: 70px;">
        @if (Session::has('mensaje'))
        <div class="alert alert-success  alert-dismissible fade show" role="alert">
            {{Session::get('mensaje')}}
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

        <form action="{{route('agregarProductos')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="img" class="form-label">Subir img</label>
                <input type="file" class="form-control form-control-lg" value="{{old('img')}}" name="img">
            </div>


            <div class="mb-3">
                <label class="form-label">Nombre/Especialidad producto</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre_producto')}}" name="nombre_producto">

            </div>

            <div class="mb-3">
                <label class="form-label"> Breve descripción</label>
                <input type="text" class="form-control form-control-lg" value="{{old('descripcion')}}" name="descripcion">

            </div>

            <label class="form-label">Categoria del producto</label>
            <select class="form-select form-select-lg mb-3" aria-label="Default select example" name="tipo_producto" required>
                <option value="pizzas">Pizzas</option>
                <option value="pepitos">Pepitos</option>
                <option value="pastas">Pastas</option>
                <option value="extras">Extras</option>
              </select>

              <div class="mb-3">
                <label class="form-label">Precio chica</label>
                <input type="text" class="form-control form-control-lg" value="{{old('precio_chica')}}" name="precio_chica">
            </div>

            <div class="mb-3">
              <label class="form-label">Precio grande</label>
              <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('precio_grande')}}" name="precio_grande">
            </div>

            <div class="mb-3">
                <label class="form-label">Precio</label>
                <input type="text" class="form-control form-control-lg" value="{{old('precio')}}" name="precio">
            </div>


            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar producto</button>
            </div>
        </form>
<br>
    </div>
</div>
@endsection
