<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Articulo;
use App\Models\Consumo;
use App\Models\Pedido;
use App\Models\Nota;
use Illuminate\Support\Facades\DB;



class FormularioCrearPedido extends Component
{
    public $tamano, $productos, $producto, $categoria, $cantidad;
    public $consumo, $cliente, $nota,  $total, $pedido, $articulos;

    protected $rules = [
        'producto' => 'required',
        'cantidad' => 'required',
        'tamano' => 'required',
        'categoria' => 'required',
        'consumo' => 'required',
    ];

    public function mount()
    {
        $this->categoria = "pizzas";
        $this->cantidad = "1";
        $this->tamano = 'chica';
        $this->consumo = "local";
        $this->productos = Categoria::where("categoria_producto", $this->categoria)->get();
        $this->producto = $this->productos->first()->producto_id;
        $this->articulos = collect();
        $this->pedido = new Pedido;
        $this->total = 0;
        $this->consumo = new Consumo;

    }

    public function render()
    {
        return view('livewire.formulario-crear-pedido');
    }

    public function updatedCategoria($categoria)
    {
        $this->categoria = $categoria;
        $this->productos = Categoria::where("categoria_producto", $this->categoria)->get();
        $this->producto = $this->productos->first()->producto_id;
    }

    public function agregar_articulo()
    {
        $this->validate();
        $articulo = new Articulo;
        $articulo->producto_id = $this->producto;
        $articulo->cantidad = $this->cantidad;
        $articulo->consumo = $this->consumo;
        $articulo->tamano = $this->tamano;
        $this->articulos->push($articulo);
        $this->calcular_total();
    }

    public function calcular_total(){
        $this->total=0;
        foreach ($this->articulos as $item){
            if(is_array($item)){
                $item = new Articulo($item);
            }
         if($item->producto->categoria->categoria_producto != "pizzas"){
            $this->total = $this->total + ($item->cantidad * $item->producto->precio->precio_chica);
         }else{
            if ($item->tamano == "chica") {
                $this->total = $this->total + ($item->cantidad * $item->producto->precio->precio_chica);
            } else {
                $this->total = $this->total + ($item->cantidad * $item->producto->precio->precio_grande);
            }            
        }
      }
    }

    public function eliminar_articulo($item)
    {
        $this->articulos->splice($item, 1);
        $this->calcular_total();
    }

    public function crear_pedido(){
        try {
            DB::beginTransaction();
            
        $pedido = Pedido::create([
            'cliente_id' => $this->cliente->id,
            'usuario_id' => auth()->user()->id,
            'status_pedido' => 'preparandose',
            'total_pedido' =>$this->total,
        ]);

        $pedido_id = $pedido->id;

         // Se crea el modelo de Consumo con el tipo de consumo y el id del pedido
        $consumo = Consumo::create([
            'pedido_id' => $pedido_id,
            'tipo_consumo' => $this->consumo,
        ]);

         // Se crea el modelo de Consumo con el tipo de consumo y el id del pedido
        $nota = Nota::create([
            'pedido_id' => $pedido_id,
            'nota_pedido' => $this->nota,
        ]);


        $data = $this->articulos->map(function ($item) use($pedido_id) {
            return [
                'pedido_id' => $pedido_id,
                'producto_id' => $item['producto_id'],
                'cantidad' => $item['cantidad'],
                'tamano' => $item['tamano']
            ];
        })->toArray();

        DB::table('articulos')->insert($data);      

            DB::commit();
        } catch (\Throwable $e) {
            dd($e);
            DB::rollBack();
        
            // Manejo de errores y registro del error aquí...
        }
    }
}
