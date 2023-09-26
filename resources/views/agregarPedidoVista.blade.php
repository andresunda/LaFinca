@extends('layouts.layout')
@section('content')
<div class="card card-content shadow-sm">
    <div class="card-body">
        <h1>Crear Pedido</h1>
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

        <form action="{{route('agregarPedido')}}" method="POST">
            @csrf

            <input type="hidden" value="{{$id}}" name="id">

            <div class="mb-3">
                <label class="form-label">Descripcion del pedido</label>
                <input type="text" class="form-control form-control-lg" value="{{old('descripcion_pedido')}}" name="descripcion_pedido">
            </div>


            <br>
            <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Crear pedido</button>
            </div>
        </form>
<br>
    </div>
</div>
@endsection
