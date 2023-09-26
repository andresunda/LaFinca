@if (count($actividades))
    @foreach ($actividades as $actividad)
        <tr>
            <td>{{ translate_modulo($actividad->subject_type) }}</td>
            <!--Modulo/Modelo-->
            <td>{{ $actividad->log_name }}</td>
            <!---Usuario Loggeado-->
            <td>{{ $actividad->description }}</td>
            <!---Descripcion-->
            <td>{{ translate($actividad->event) }}</td>
            <!--Evento-->
            <td>{{ $actividad->created_at->format('d/m/Y H:i:s') }}</td>
            <!--Fecha-->
            <td>
                <div class="text-center">
                    <button type="button" class="btn btn-light btn-lg" data-bs-toggle="modal"
                        data-bs-target="#actividadmodal{{ $actividad->id }}">
                        <i class="fas fa-eye"></i> </button>

                    <!-- Modal -->
                    <div class="modal fade" id="actividadmodal{{ $actividad->id }}" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-body">
                                    <div class="card card-content shadow-sm">
                                        <div class="card-body">
                                            <h2>Datos de la modificacion</h2>
                                            <br>
                                            <div>
                                                <pre>{{ $actividad->properties }}</pre>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            </div>

        </tr>
    @endforeach
@endif
