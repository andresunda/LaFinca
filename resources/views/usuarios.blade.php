@extends('layouts.layout')
@section('content')
    <div class="card card-content shadow-sm">
        <div class="card-body">
            <h1>Usuarios</h1>
            <br>
            <div class="row">
                <div class="col-lg-9">
                    <input class="form-control form-control-lg" id="text" type="text"
                        placeholder="Buscar por teléfono..." aria-label=".form-control-lg example">
                    <br>
                </div>
                <div class="col-lg-3">
                    <div class="d-grid gap-2">
                        <!-------------------------------->
                        <!-- Button trigger modal -->


                        <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                            data-bs-target="#modal1">
                            <i class="fa-solid fa-plus"></i> Agregar Usuarios
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="modal1" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <div class="card card-content shadow-sm">
                                            <div class="card-body">
                                                <h1 class="text-center">Agregar usuario</h1>


                                                <form action="{{ route('agregarUsuario') }}" method="POST">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label class="form-label">Nombre</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            value="{{ old('nombre') }}" name="nombre">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Apellido paterno</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            value="{{ old('apellido_paterno') }}" name="apellido_paterno">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Apellido materno</label>
                                                        <input type="text" class="form-control form-control-lg"
                                                            value="{{ old('apellido_materno') }}" name="apellido_materno">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Teléfono</label>
                                                        <input type="number" maxlength="10"
                                                            class="form-control form-control-lg"
                                                            value="{{ old('teléfono') }}" name="teléfono">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Seleccionar tipo de usuario</label>
                                                        <select class="form-select form-control-lg" name="rol">
                                                            <option @if (old('rol') == 0) selected @endif
                                                                value="0">Administrador</option>
                                                            <option @if (old('rol') == 1) selected @endif
                                                                value="1">Mesero</option>
                                                            <option @if (old('rol') == 2) selected @endif
                                                                value="2">Cocinero</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Contraseña</label>
                                                        <input type="password" class="form-control form-control-lg"
                                                            name="contraseña">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Confirmar Contraseña</label>
                                                        <input type="password" class="form-control form-control-lg"
                                                            name="confirmarContraseña">
                                                    </div>

                                                    <br>
                                                    <div class="d-grid gap-2">
                                                        <button type="submit" class="btn btn-primary btn-lg">Agregar usuario</button>
                                                    </div>

                                                </form>

                                                <br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-------------------------------->
                    </div>
                </div>
            </div>

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


            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido paterno</th>
                            <th scope="col">Apellido materno</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Fecha de registro</th>
                            <th scope="col">Modificar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="resultados" class="table-group-divider">    <!-------------IMPRIME LAS BUSQUEDAS------>
                    </tbody>
                    
                    <tbody class="table-group-divider">

                        @include('pages.usuarios')


                    </tbody>
                </table>
            </div>

            <br>

            {{ $usuarios->render() }}

        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            document.getElementById("text").addEventListener("keyup", () => {
                if ((document.getElementById("text").value.length) >= 1)
                    fetch(`/usuarios/search?text=${document.getElementById("text").value}`, {
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
