<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleados;

class EmpleadosController extends Controller
{
    public function index(){
        $empleados = Empleados::select('empleados.id', 'empleados.nombre', 'empleados.apellido', 'empleados.razon_social', 'empleados.cedula', 'empleados.telefono', 'empleados.pais', 'empleados.ciudad')
                        ->from('empleados')
                        ->where('delete', 0)
                        ->get();

        return $empleados;
    }


    public function save(Request $request) {
        $request->validate([
            'nombre' => 'required|min:3',
        ]);

        $empleados = new Empleados;
        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellido;
        $empleados->razon_social = $request->razon_social;
        $empleados->cedula = $request->cedula;
        $empleados->telefono = $request->telefono;
        $empleados->pais = $request->pais;
        $empleados->ciudad = $request->ciudad;
        $empleados->created_at = time();
        $empleados->updated_at = time();
        $empleados->save();

        return redirect()->route('empleados')->with('success', 'Empleado  creado correctamente');
    }

    public function edit($id){
        $empleado = Empleados::find($id);

        return view('empleados.edit', ['empleado' => $empleado]);
    }

    public function update(Request $request, $id){
        $empleados = Empleados::find($id);

        $empleados->nombre = $request->nombre;
        $empleados->apellido = $request->apellido;
        $empleados->razon_social = $request->razon_social;
        $empleados->cedula = $request->cedula;
        $empleados->telefono = $request->telefono;
        $empleados->pais = $request->pais;
        $empleados->ciudad = $request->ciudad;
        $empleados->save();

        return redirect()->route('empleados')->with('success', 'Empleado  actualizado correctamente');
    }

    public function delete($id){
        $empleado = Empleados::find($id);

        $empleado->deleted = 1;
        $empleado->save();

        return redirect()->route('empleados')->with('success', 'El empleado se eliminó correctamente');
    }

}
