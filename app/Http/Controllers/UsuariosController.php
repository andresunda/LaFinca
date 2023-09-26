<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Autentificacion;
use Illuminate\Support\Facades\Hash;

use DB;
use Spatie\Activitylog\Models\Activity;
use App\Models\Producto;
use App\Models\Precio;
use App\Models\Categoria;

//AAAAAAAAAAAAAAA
class UsuariosController extends Controller
{
    public function index()
    {
        $pizzas = Categoria::where('categoria_producto', '=', 'pizzas')->get();
        $pepitos = Categoria::where('categoria_producto', '=', 'pepitos')->get();
        $otros = Categoria::where('categoria_producto', '=', 'otros')->get();
        
        return view('index', compact('pizzas', 'pepitos', 'otros'));
    }

public function cuenta(){
    $cuenta = Auth::user()->id;
    return view('cuenta', compact('cuenta'));
}


//============================================================FUNCION DEL INICIAR SESION============================================================


public function login(Request $request)
{
    $autentificacion = User::with('autentificacion')->where('teléfono', $request->teléfono)->first();

    if ($autentificacion && Hash::check($request->password, $autentificacion->autentificacion->password)) {
        Auth::login($autentificacion);
        $request->session()->regenerate();
        $rol = $autentificacion->autentificacion->rol;
         
        if ($rol == 0) {
            return redirect()->intended('panel_administrativo');
        } elseif ($rol == 1) {
            return redirect()->intended('clientes');
        } else {
            return redirect()->intended('pedidos');
        }
    } else {
        return back()->withErrors([
            'teléfono' => 'El teléfono o contraseñas son incorrectos!',
        ])->onlyInput('teléfono');
    }
}
    //=====================================================================================================================================


//Modificar cuenta funcion
public function modificarCuenta(Request $request){

    $usuario = User::find($request->id);

    $request->validate([
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
    ]);

    if ($request->teléfono != $usuario->teléfono) {
        $request->validate([
            'teléfono' => ['unique:users,teléfono,' . $usuario->id, 'max:10', 'min:10'],
        ]);

        $usuario->update([
            'teléfono' => $request->teléfono,
        ]);
    }

    if ($request->contraseña != $request->confirmarContraseña) {
        return back()->withErrors([
            'contraseña' => 'Las contraseñas no son iguales.',
        ])->withInput();
    }

    if($request->contraseña){
        $request->validate([
            'contraseña' => 'required|min:6',
        ]);

        $autentificacion = $usuario->autentificacion;
        $autentificacion->password = bcrypt($request->contraseña);
        $autentificacion->save();
    }

    $usuario->update([
        'nombre' => $request->nombre,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
    ]);

    $autentificacion = $usuario->autentificacion;
    $autentificacion->save();

    return redirect()->back()->with('mensaje', 'Se han actualizado los datos "'.$usuario->nombre.' '.$usuario->apellido_paterno.'"');
}

    //===================================================VISTA PARA EL PAGINADO DE USUARIOS============================================================
    public function usuarios(){
        $usuarios = User::latest()->paginate(3);

        return view('usuarios', compact('usuarios'));
    }
//=====================================================================================================================================


//============================================================FUNCION DEL BUSCADOR============================================================

    public function buscarUsuarios(Request $request){
        $usuarios = User::where("teléfono",'like',"%".$request->text."%")->take(3)->get();
        return view("pages.usuarios",compact("usuarios"));
    }
//=====================================================================================================================================


//==================================VISTA PARA VER/MOSTRAR CON UN PAGINADO DE 3 LAS ACTIVIDADES DE LOS USUARIOS==============================
        public function actividades(){
            $actividades = Activity::latest()->Paginate(10);
            return view('actividades', compact('actividades'));
        }


 //=====================================================FUNCION AGREGAR USUARIOS=======================================================
     public function agregarUsuario(Request $request){
        // return $request;

        $request->validate([
            'nombre' => 'required|max:255',
            'apellido_paterno' => 'required|max:255',
            'apellido_materno' => 'required|max:255',
            'teléfono' => 'required|max:10|min:10|unique:users',
            'confirmarContraseña' => 'required|min:6',
            'contraseña' => 'required|min:6',
        ], [
            'teléfono.unique' => 'El teléfono ya esta en uso!',
        ]);

        if ($request->contraseña != $request->confirmarContraseña) {
            return back()->withErrors([
                'contraseña' => 'Las contraseñas no son iguales.',
            ])->withInput();
        }

        $usuario = User::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'teléfono' => $request->teléfono,
        ]);

        $autentificacion = Autentificacion::create([
            'user_id' => $usuario->id,
            'rol' => $request->rol,
            'password' => bcrypt($request->contraseña),
        ]);

        return redirect()->back()->with('mensaje', 'Se agrego con éxito al usuario "'.$usuario->nombre.'"');
    }

//Modificar usuario funcion
public function modificarUsuario(Request $request){
    $usuario = User::find($request->id);

    $request->validate([
        'nombre' => 'required|max:255',
        'apellido_paterno' => 'required|max:255',
        'apellido_materno' => 'required|max:255',
    ]);

    if ($request->teléfono != $usuario->teléfono) {
        $request->validate([
            'teléfono' => 'required|max:10|min:10|unique:users',
        ], [
            'teléfono.unique' => 'El teléfono ya esta en uso!',
        ]);

        $usuario->update([
            'teléfono' => $request->teléfono,
        ]);
    }

    if ($request->contraseña != $request->confirmarContraseña) {
        return back()->withErrors([
            'contraseña' => 'Las contraseñas no son iguales.',
        ])->withInput();
    }

    if($request->contraseña){
        $request->validate([
            'contraseña' => 'required|min:6',
        ]);

        $autentificacion = $usuario->autentificacion;
        $autentificacion->password = bcrypt($request->contraseña);
        $autentificacion->save();
    }

    $usuario->update([
        'nombre' => $request->nombre,
        'apellido_paterno' => $request->apellido_paterno,
        'apellido_materno' => $request->apellido_materno,
    ]);

    $autentificacion = $usuario->autentificacion;
    $autentificacion->rol = $request->rol;
    $autentificacion->save();

    return redirect()->back()->with('mensaje', 'Se han actualizado los datos del usuario "'.$usuario->nombre.' '.$usuario->apellido_paterno.'"');
}



public function eliminarUsuario ($id){
    if(Auth::user()->id == $id){
        return back();
    }
    User::find($id)->delete();
    return redirect()->back()->with('mensaje', 'Se ha eliminado correctamente el usuario');
}


//========================================================================================================================================================
}
