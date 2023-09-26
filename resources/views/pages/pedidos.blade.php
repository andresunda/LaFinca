@if (count($pedidos))
    @foreach ($pedidos as $pedido)
        <tr>
            <th scope="row">{{ $pedido->id }}</th>
            <td>{{ $pedido->cliente->id }}</td>
            <td>{{ $pedido->cliente->nombre }}</td>
            <td>
                
                
                @livewire('articulos-pedido' , ['pedido_id' => $pedido->id])

            </td>
            <td>{{ $pedido->consumo->tipo_consumo }}</td>
            <td>{{$pedido->nota->nota_pedido ?? 'Sin nota'}}</td>
            <td>{{ $pedido->created_at }}</td>
            <td>
                @if ($pedido->status_pedido == 'preparandose')
                    <button class="btn btn-warning" data-bs-toggle="modal"
                        data-bs-target="#cambiarEstadoModal{{ $pedido->id }}">Preparandose...</button>
                @elseif ($pedido->status_pedido == 'preparado')
                    <button class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#cambiarEstadoModal{{ $pedido->id }}">Preparado</button>
                @elseif ($pedido->status_pedido == 'entregado')
                    <button class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#cambiarEstadoModal{{ $pedido->id }}">Entregado</button>
                @elseif ($pedido->status_pedido == 'cancelado')
                    <button class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#cambiarEstadoModal{{ $pedido->id }}">Cancelado</button>
                @endif
                <!--<td>-->
                {{--@endforeach--}}
                {{--@endif--}}

                <!-- Modal para cambiar estado -->
                <div class="modal fade" id="cambiarEstadoModal{{ $pedido->id }}" tabindex="-1"
                    aria-labelledby="cambiarEstadoModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="cambiarEstadoModalLabel">Cambiar estado del pedido</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('cambiar_statuspedido', $pedido->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">

                                        <label class="form-label">Seleccione el estado del pedido:</label>
                                        <select class="form-select form-select-lg mb-3"
                                            aria-label="Default select example" name="status_pedido" required>
                                            <option value="preparandose">Preparandose...</option>
                                            <option value="preparado">Preparado</option>
                                            <option value="entregado">Entregado</option>
                                            <option value="cancelado">Cancelado</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-grid gap-2">
                    <a href="{{ route('crearticket', $pedido->id) }}" class="btn btn-success btn-lg" a target="_blank"><i
                            class="fas fa-print"></i></a>
                </div>
            </td>

            <td>
                <div class="d-grid gap-2">
                    <a href="{{ route('modificarPedidoVista', $pedido->id) }}" class="btn btn-secondary btn-lg"><i
                            class="fa-solid fa-pen-to-square"></i></a>
                </div>
            </td>
            <td>
                <div class="d-grid gap-2">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $pedido->id }}"
                        class="btn btn-danger btn-lg"><i class="fa-solid fa-trash-can"></i></button>
                </div>
            </td>

        </tr>
    @endforeach
    {{--@endif--}}
    <br>

    
    

    @foreach ($pedidos as $pedido)
        {{-- Modal --}}
        <div class="modal fade" id="exampleModal{{ $pedido->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Eliminar pedido</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ¿Estas seguro de eliminar el pedido N° {{ $pedido->id }}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <a href="{{ route('eliminarPedido', $pedido->id) }}"
                            class="btn btn-danger fa-beat">Eliminar</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif

{{--<script>
setInterval(function(){
   location.reload();
}, 5000);
</script>--}}
