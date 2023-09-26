@extends('layouts.layout')
@section('content')

<div style="min-height: 100px;">
    @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('mensaje') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Mi perfil</h1>

            <div>
                <br>
                @include('pages.cuenta')
            </div>

            <br>
            
        </div>
    </div>

@endsection
