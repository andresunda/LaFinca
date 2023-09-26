<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Producto;
use App\Models\Precio;
use App\Models\Categoria;

use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function productos()
    {
        $productos = Producto::with(['categoria', 'precio'])->latest()->paginate(3);

        return view('productos', compact('productos'));
    }

    public function menu()
    {
        $pizzas = Categoria::where('categoria_producto', '=', 'pizzas')->get();
        $pepitos = Categoria::where('categoria_producto', '=', 'pepitos')->get();
        $otros = Categoria::where('categoria_producto', '=', 'otros')->get();

        return view('menu', compact('pizzas', 'pepitos', 'otros'));
    }

    //============================================================FUNCION DEL BUSCADOR============================================================

    public function buscarProductos(Request $request)
    {
        $productos = Producto::where("nombre_producto", 'like', "%" . $request->text . "%")->take(3)->get();
        return view("pages.productos", compact("productos"));
    }


    //Agregar producto funcion
    public function agregarProductos(Request $request)
    {
        // return $request;

        $request->validate([
            'nombre_producto' => 'required|unique:productos|max:255',
            'descripcion' => 'required|max:255',
            'categoria_producto' => 'required',
            'precio_chica' => 'required|max:255',
            'precio_grande' => 'required|max:255',
        ], [
            'nombre_producto.unique' => 'Este producto ya existe!',
        ]);

        //$imagen = $request->file('img');

        $imagen = $request->img->store('public/imagenProducto');
        $imagen = substr($imagen, 7);


        $producto = Producto::create([
            'nombre_producto' => $request->nombre_producto,
            'descripcion' => $request->descripcion,
            'img' => $imagen,
        ]);

        $categoria = Categoria::create([
            'producto_id' => $producto->id,
            'categoria_producto' => $request->categoria_producto,
        ]);

        $precio = Precio::create([
            'producto_id' => $producto->id,
            'precio_chica' => $request->precio_chica,
            'precio_grande' => $request->precio_grande,
        ]);

        return redirect()->back()->with('mensaje', 'Se agrego con éxito el producto "' . $producto->nombre_producto . '"');
    }
    //Modificar producto funcion
    public function modificarProducto(Request $request)
    {
        $producto = Producto::find($request->id);

        $imagen = $request->img->store('public/imagenProducto');
        $imagen = substr($imagen, 7);

        $request->validate([
            'nombre_producto' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'categoria_producto' => 'required', // actualizar a categoria_producto_id
            'precio_chica' => 'required|max:255',
            'precio_grande' => 'required|max:255',
        ]);

        if ($request->nombre_producto != $producto->nombre_producto) {
            $request->validate([
                'nombre_producto' => 'unique:productos|max:255',
            ], [
                'nombre_producto.unique' => 'Este producto ya existe!',
            ]);

            $producto->update([
                'nombre_producto' => $request->nombre_producto,
            ]);
        }

        $producto->update([
            'descripcion' => $request->descripcion,
            'img' => $imagen,
        ]);

        $categoria = Categoria::find($request->producto_id); // actualizar a categoria_producto_id

        if ($categoria) {
            $categoria->update([
                'categoria_producto' => $request->categoria_producto,
            ]);
        } else {
            return redirect()->back()->with('mensaje', 'Se modifico con exito el producto "' . $producto->nombre_producto . '"');
        }

        $precio = Precio::find($request->id); // actualizar a id

        if ($precio) {
            $precio->update([
                'precio_chica' => $request->precio_chica,
                'precio_grande' => $request->precio_grande,
            ]);
        } else {
            return redirect()->back()->with('mensaje', 'No se encontro el precio "' . $producto->nombre_producto . '"');
        }

        return redirect()->back()->with('mensaje', 'Se modificó con éxito el producto "' . $producto->nombre_producto . '"');
    }



    public function eliminarProducto($id)
    {
        DB::table('productos')->where('id', $id)->delete();

        return redirect()->back()->with('mensaje', 'Se elimino con éxito el producto');
    }
}
