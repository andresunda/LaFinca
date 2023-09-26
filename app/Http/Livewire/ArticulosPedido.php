<?php

namespace App\Http\Livewire;

use App\Models\Articulo;
use Livewire\Component;

class ArticulosPedido extends Component
{
    public $pedido_id, $articulos;

    public function render()
    {
        return view('livewire.articulos-pedido');
    }

    public function mount()
    {
        $this->articulos = Articulo::where('pedido_id', $this->pedido_id)->get(); 
        
    }

    
}
