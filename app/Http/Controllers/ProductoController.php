<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Producto;//BD 

class ProductoController extends Controller
{

    public function index()
    {
        $consultaProductoCt = Producto::ProductoCt();
        return view('InicioProducto',compact('consultaProductoCt'));
    }

    public function create()
    {
        return view('NuevoProducto');
    }

    public function store(Request $request)
    {
        //Validacion
        $this->validate($request,
        [
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);
        
        //Incercion
        $guardaProducto = new Producto;
        $guardaProducto->nombre = $request->nombre;
        $guardaProducto->descripcion = $request->descripcion;
        $guardaProducto->save();

        return redirect('/InicioProducto')->with('alta','El producto fue dado de alta exitosamente');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $consultaProductoCn = Producto::ProductoCn($id);
        return view ('EditaProducto')->with('consultaProductoCn',$consultaProductoCn[0]);
    }

    public function update(Request $request)
    {
        //Validacion
        $this->validate($request,
        [
            'nombre'=>'required',
            'descripcion'=>'required'
        ]);

        //Modificacion
        $modificaProducto = Producto::findOrFail($request->id);
        $modificaProducto->nombre = $request->nombre;
        $modificaProducto->descripcion = $request->descripcion;
        $modificaProducto->save();

        return redirect('/InicioProducto')->with('modificacion','El producto fue modificado exitosamente');
    }

    public function destroy($id)
    {
        //Eliminacion
        $eliminaProducto = Producto::findOrFail($id);
        $eliminaProducto->delete();

        return redirect('/InicioProducto')->with('eliminacion','El producto fue eliminado exitosamente');
    }
}
