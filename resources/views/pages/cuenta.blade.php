<div>
    <div class="row text-center">
        <div class="col-xl-12 col-sm-12 mb-12">
            <div class="bg-white rounded shadow-sm py-5 px-4">
                @if (Auth::user()->autentificacion->rol == 0)
                    <img src="img/administrador.png" alt="" width="200"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                @elseif (Auth::user()->autentificacion->rol == 1)
                    <img src="img/mesero.png" alt="" width="200"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                @elseif (Auth::user()->autentificacion->rol == 2)
                    <img src="img/chef.png" alt="" width="200"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                @endif
                <h2 class="mb-0">{{ Auth::user()->nombre }} {{ Auth::user()->apellido_paterno }}
                    {{ Auth::user()->apellido_materno }}</h2>
                <span class="small text-uppercase text-muted">
                    @if (Auth::user()->autentificacion->rol == 0)
                        Administrador
                    @elseif (Auth::user()->autentificacion->rol == 1)
                        Mesero
                    @elseif (Auth::user()->autentificacion->rol == 2)
                        Cocinero
                    @endif
                </span>
                <br>
                <br>

                <h4>Teléfono: {{ Auth::user()->teléfono }}</h4>
                <hr>
                <h4>Modificar perfil</h4>
                <div class="d-grid gap-2 text-center">
                    <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                        data-bs-target="#modificarModal1{{ Auth::user()->id }}">
                        <i class="fa-solid fa-pen-to-square"></i> </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modificarModal1{{ Auth::user()->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card card-content shadow-sm">
                                        <div class="card-body">
                                            <h1>Modificar Cuenta</h1>
                                            <br>
                                            <br>
                                            <form action="{{ route('modificarCuenta') }}" method="POST">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                                                <div class="mb-3">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('nombre')) {{ Auth::user()->nombre }} @endif{{ old('nombre') }}"
                                                        name="nombre">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Apellido Paterno</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('apellido_paterno')) {{ Auth::user()->apellido_paterno }} @endif{{ old('apellido_paterno') }}"
                                                        name="apellido_paterno">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Apellidos Materno</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('apellido_materno')) {{ Auth::user()->apellido_materno }} @endif{{ old('apellido_materno') }}"
                                                        name="apellido_materno">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Teléfono</label>
                                                    <input type="number" maxlength="10"
                                                        class="form-control form-control-lg"
                                                        value="@if (!old('teléfono')) {{ Auth::user()->teléfono }} @endif{{ old('teléfono') }}"
                                                        name="teléfono">

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Contraseña</label>
                                                    <input type="password" class="form-control form-control-lg"
                                                        value="" name="contraseña">

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Confirmar Contraseña</label>
                                                    <input type="password" class="form-control form-control-lg"
                                                        value="" name="confirmarContraseña">

                                                </div>

                                                <br>
                                                <div class="d-grid gap-2">
                                                    <button type="submit" class="btn btn-primary btn-lg">Guardar
                                                        cambios</button>
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
                </div>
            </div>
        </div>

    </div>
    <br>
</div>
