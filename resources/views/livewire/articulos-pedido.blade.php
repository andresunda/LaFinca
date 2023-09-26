<div>
    <div class="text-center">
        <button type="button" class="btn btn-light btn-lg btn-block" data-bs-toggle="modal"
            data-bs-target="#dispararmodal{{ $pedido_id }}">
            <i class="fas fa-eye"></i>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="dispararmodal{{ $pedido_id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="card card-content shadow-sm">
                        <div class="card-body">
                            <h2>Pedido:</h2>
                            <br>
                            <div>
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Especialidad</th>
                                            <th scope="col">Tamaño</th>
                                            <th scope="col">Precio Unitario</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @php
                                            $total = 0;
                                        @endphp
                                        @foreach ($articulos as $item)
                                            @if (is_array($item))
                                                @php
                                                    $item = new App\Models\Articulo($item);
                                                @endphp
                                            @endif
                                            <tr>
                                                <th scope="row">{{ $item->cantidad }}</th>
                                                <td>{{ $item->producto->nombre_producto }}</td>
                                                <td>
                                                    @if($item->producto->categoria->categoria_producto == "pepitos")
                                                        .
                                                    @elseif($item->producto->categoria->categoria_producto == "otros")
                                                        .
                                                    @else
                                                        {{$item->tamano}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($item->tamano === 'chica')
                                                        ${{ $item->producto->precio->precio_chica }}
                                                        @php
                                                            $total += $item->producto->precio->precio_chica * $item->cantidad;
                                                        @endphp
                                                    @else
                                                        ${{ $item->producto->precio->precio_grande }}
                                                        @php
                                                            $total += $item->producto->precio->precio_grande * $item->cantidad;
                                                        @endphp
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3" style="text-align:right; padding-right:25px;"><strong>Total:</strong></td>
                                            <td>${{ $total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
