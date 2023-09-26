@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Modificar Cliente</h1>
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
@endsection
