<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use TCPDF;

class PedidosController extends Controller
{

    //
    public function buscarPedidos(Request $request)
    {
        $pedidos = Cliente::where("nombre", 'like', "%" . $request->text . "%")->take(3)->get();
        return view("pages.pedidos", compact("pedidos"));
    }

    public function pedidos()
    {
        $pedidos = Pedido::latest()->paginate(5);

        return view('pedidos', compact('pedidos'));
    }

    public function crearticket(Request $request, $id)
    {

        $tickets = Pedido::where('id', $id)->first();
        // $tamanoTicket = array(0,0,80,80);
        $articulos = Articulo::where('pedido_id', $id)->get();


        $pdf = Pdf::loadView('crearticket', compact('tickets', 'articulos'))->setPaper('b7', 'portrait'); //->setPaper($tamanoTicket)//
        return $pdf->stream('Ticket' . $tickets->id . 'pdf');
    }


    public function agregarPedido(Request $request)
    {
        //dd($request);

        $request->validate([
            'descripcion_pedido' => 'required|max:255',
        ]);

        $pedidos = Pedido::create([
            'id_cliente' => $request->id,
            'descripcion_pedido' => $request->descripcion_pedido,
        ]);


        return redirect()->back()->with('mensaje', 'Se agrego con éxito el pedido del cliente "' . $pedidos->cliente->nombre . '"');
    }

    public function modificarPedido(Request $request)
    {
        // return $request;

        $pedido = Pedido::find($request->id);

        $request->validate([
            'descripcion_pedido' => 'required|max:255',
        ]);

        $pedido->update([
            'descripcion_pedido' => $request->descripcion_pedido,
        ]);

        return redirect()->back()->with('mensaje', 'Se modificó con éxito el pedido de  "' . $pedido->cliente->nombre . '"');
    }

    public function cambiar_statuspedido(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        $pedido->update([
            'status_pedido' => $request->status_pedido,
        ]);

        return redirect()->back()->with('mensaje', 'Se modificó con éxito el status del pedido pedido de  "' . $pedido->cliente->nombre . '"');
    }

    public function eliminarPedido($id)
    {

        DB::table('pedidos')->where('id', $id)->delete();

        return redirect()->back()->with('mensaje', 'Se elimino con exito el pedido');
    }
}
