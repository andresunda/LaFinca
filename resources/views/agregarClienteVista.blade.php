@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Agregar cliente</h1>
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

        <form action="{{route('agregarCliente')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre completo</label>
                <input type="text" class="form-control form-control-lg" value="{{old('nombre')}}" name="nombre">

            </div>



            <div class="mb-3">
              <label class="form-label">Teléfono</label>
              <input type="number" maxlength="10" class="form-control form-control-lg" value="{{old('teléfono')}}" name="teléfono">

            </div>

            <div class="mb-3">
                <label class="form-label">Dirección</label>
                <input type="text" class="form-control form-control-lg" value="{{old('direccion')}}" name="direccion">

            </div>

            <div class="mb-3">
                <label class="form-label">Colonia o fraccionamiento</label>
                <input type="text" class="form-control form-control-lg" value="{{old('col_fracc')}}" name="col_fracc">

            </div>

            <div class="mb-3">
                <label class="form-label">Referencias de la casa</label>
                <input type="text" class="form-control form-control-lg" value="{{old('referencias')}}" name="referencias">

            </div>

            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Agregar cliente</button>
            </div>
        </form>
<br>
    </div>
</div>
@endsection
