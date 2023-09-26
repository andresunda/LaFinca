@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Modificar pedido</h1>

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
            <form action="{{route('modificarPedido')}}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Descripcion</label>
                    <input type="text" class="form-control form-control-lg" value="@if(!old('descripcion_pedido')){{$pedido->descripcion_pedido}}@endif{{old('descripcion_pedido')}}" name="descripcion_pedido">
                </div>

                <input type="hidden" name="id" value="{{$pedido->id}}">

                <br>
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">Guardar cambios</button>
                </div>
            </form>
            <br>
        </div>
    </div>
@endsection
