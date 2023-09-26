<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class ClientesController extends Controller
{

    //VER CLIENTES
    public function clientes(){
        $clientes = Cliente::latest()->paginate(3);

        return view('clientes', compact('clientes'));
    }

    //============================================================FUNCION DEL BUSCADOR============================================================

    public function buscarClientes(Request $request){
        $clientes = Cliente::where("teléfono",'like',"%".$request->text."%")->take(3)->get();
        return view("pages.clientes",compact("clientes"));
    }
//=====================================================================================================================================

    //=====================================================FUNCION AGREGAR USUARIOS=======================================================
public function agregarCliente(Request $request){
        // return $request;

        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'teléfono' => 'required|max:10|min:10|unique:clientes|unique:users',
        ], [
            'teléfono.unique' => 'El teléfono ya esta en uso!',
        ]);


        $clientes = Cliente::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'teléfono' => $request->teléfono,
        ]);


        return redirect()->back()->with('mensaje', 'Se agrego con éxito al cliente "'.$clientes->nombre.'"');
    }

//Modificar usuario funcion
public function modificarCliente(Request $request){
    $cliente = Cliente::find($request->id);

    $request->validate([
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
        'teléfono' => [
            'required',
            'max:10',
            'min:10',
            Rule::unique('clientes')->ignore($cliente->id),
        ],
    ], [
        'teléfono.unique' => 'El teléfono ya está en uso!',
    ]);

    $cliente->update([
        'nombre' => $request->nombre,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
        'teléfono' => $request->teléfono,
    ]);

    return redirect()->back()->with('mensaje', 'Se modificó con éxito al cliente "'.$cliente->nombre.'"');
}

public function eliminarCliente ($id){
    Cliente::find($id)->delete();
    return redirect()->back()->with('mensaje', 'Se elimino con exito el cliente');
}

}
