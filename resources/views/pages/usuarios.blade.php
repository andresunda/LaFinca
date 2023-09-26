@if (count($usuarios))
    @foreach ($usuarios as $usuario)
        <tr>
            <th scope="row">{{ $usuario->id }}</th>
            <td>{{ $usuario->nombre }}</td>
            <td>{{ $usuario->apellido_paterno }}</td>
            <td>{{ $usuario->apellido_materno }}</td>
            <td>{{ $usuario->teléfono }}</td>
            <td>

                @switch(true)
                    @case($usuario->autentificacion->rol == 0)
                        Administrador
                    @break

                    @case($usuario->autentificacion->rol == 1)
                        Mesero
                    @break

                    @case($usuario->autentificacion->rol == 2)
                        Cocinero
                    @break
                @endswitch

            </td>
            <td>{{ $usuario->created_at }}</td>

            <td>
                <div class="d-grid gap-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-toggle="modal"
                        data-bs-target="#modificarModal{{ $usuario->id }}">
                        <i class="fa-solid fa-pen-to-square"></i> </button>

                    <!-- Modal -->
                    <div class="modal fade" id="modificarModal{{ $usuario->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card card-content shadow-sm">
                                        <div class="card-body">
                                            <h1>Modificar usuario</h1>
                                            <br>
                                            <br>

                                            <form action="{{ route('modificarUsuario', $usuario->id) }}" method="POST">
                                                @csrf

                                                <div class="mb-3">
                                                    <label class="form-label">Nombre</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('nombre')) {{ $usuario->nombre }} @endif{{ old('nombre') }}"
                                                        name="nombre">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Apellido paterno</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('apellido_paterno')) {{ $usuario->apellido_paterno }} @endif{{ old('apellido_paterno') }}"
                                                        name="apellido_paterno">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">Apellido materno</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="@if (!old('apellido_materno')) {{ $usuario->apellido_materno }} @endif{{ old('apellido_materno') }}"
                                                        name="apellido_materno">
                                                </div>

                                                <input type="hidden" name="id" value="{{ $usuario->id }}">

                                                <div class="mb-3">
                                                    <label class="form-label">Teléfono</label>
                                                    <input type="number" maxlength="10"
                                                        class="form-control form-control-lg"
                                                        value="@if (!old('teléfono')) {{ $usuario->teléfono }} @endif{{ old('teléfono') }}"
                                                        name="teléfono">
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
            </td>
            <td>
                <div class="d-grid gap-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $usuario->id }}"
                        class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </td>

        </tr>
    @endforeach

    @foreach ($usuarios as $usuario)
        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{ $usuario->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estas seguro de eliminar al usuario {{ $usuario->nombre }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="{{ route('eliminarUsuario', $usuario->id) }}"
                            class="btn btn-danger fa-beat">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif
