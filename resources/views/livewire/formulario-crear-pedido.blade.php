<div>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Tipo de consumo</label>
        <select wire:model="consumo" class="form-select form-select-lg mb-3"
            aria-label=".form-select-lg example">
            <option selected>Selecciona tipo de consumo...</option>
            <option value="local">Local</option>
            <option value="llevar">Llevar</option>
        </select>
    </div>

    <form wire:submit.prevent="agregar_articulo">
        <div class="row">
            <div class="col-lg-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                    <select wire:model="cantidad" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Categoria</label>
                    <select wire:model="categoria" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        <option value="pizzas">Pizza</option>
                        <option value="pepitos">Pepito</option>
                        <option value="otros">Otro</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Productos</label>
                    <select wire:model="producto" class="form-select form-select-lg mb-3"
                        aria-label=".form-select-lg example">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->producto_id }}">{{ $producto->producto->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tamaño del producto</label>
                    <select wire:model="tamano" {{ $categoria != 'pizzas' ? 'disabled' : '' }}
                        class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                        <option value="chica">CH</option>
                        <option value="grande">GDE</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-2">
                <div class="">
                    <label for="exampleFormControlInput1" class="form-label text-white">.</label>
                </div>
                <button type="submit" class="btn btn-primary mb-3 btn-lg">Agregar</button>
            </div>
    </form>

    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Agregar nota del cliente</label>
        <textarea wire:model="nota" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

</div>


<h1 class="">Pedido</h1>
<br>


<div class="container ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Img</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Producto</th>
                <th scope="col">Tamaño</th>
                <th scope="col">Precio</th>
                <!-- <th scope="col">Subtotal</th>-->
                <th scope="col">Eliminar articulo</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $item)
                {{-- @dd($item) --}}
                @if (is_array($item))
                    @php
                        $item = new App\Models\Articulo($item);
                    @endphp
                @endif
                <tr>
                    <th scope="row"><img style="width:120px;" src="{{ asset('storage/' . $item->producto->img) }}"
                            alt="Card image cap"></th>
                    <td>{{ $item->cantidad }}</td>
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
                        @php
                            if ($item->producto->categoria->categoria_producto != 'pizzas') {
                                $precio = $item->producto->precio->precio_chica; 
                            } else {
                                if ($item->tamano == 'chica') {
                                    $precio = $item->producto->precio->precio_chica;
                                } else {
                                    $precio = $item->producto->precio->precio_grande;
                                }
                            }
                        @endphp
                        ${{$precio}}
                    </td>
                    <td><button wire:click="eliminar_articulo({{ $loop->index }})" type="submit"
                            class="btn btn-danger btn-lg">Eliminar</button></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <h3>Total: ${{ $total }}</h3>
</div>
<div class="modal-footer">
    <button wire:click="crear_pedido" type="button" class="btn btn-primary" data-bs-dismiss="modal">Realizar Pedido</button>
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
  </div>
</div>
