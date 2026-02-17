<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seminario;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;


class SeminarioController extends Controller
{   
    public function index()
    {
        $seminarios = Seminario::all();
        return view('seminario.index', compact('seminarios'));
    }

    public function crear()
    {
        #$seminarios = Seminario::all();
        return view('seminario.crear');
    }

    public function guardar(Request $request)
    {        
        $data = $request->all();

        //Validar documentacion
        request()->validate([
            'name'      => 'required',
            'init_date' => 'required|date',
            'end_date'  => 'required|date',
        ], $data);

        $data_insert=array(
                'nombre'            => $data["name"],
                'fecha_inicial'     => $data["init_date"],
                'fecha_final'       => $data["end_date"]
        );

        Seminario::create($data_insert);

        return redirect()->route('generarCursos')->with('success', 'Seminario creado exitosamente.');
    }

    public function editar($id)
    {
        #dd($id)
        $seminario = Seminario::find($id);
        return view('seminario.editar', compact('seminario'));
    }

    public function actualizar(Request $request, $id)
    {
        $input = $request->all();

        //Validar documentacion
        $request->validate([
            'name'      => 'required',
            'init_date' => 'required|date',
            'end_date'  => 'required|date',
        ], $input);

        $data_update=array(
                'nombre'            => $input["name"],
                'fecha_inicial'     => $input["init_date"],
                'fecha_final'       => $input["end_date"]
        );
    
        Seminario::where('id', $id)->update($data_update);

        return redirect()->route('generarCursos')->with('success', 'Seminario actualizado exitosamente.');
    }

    public function eliminar($id)
    {
        $seminario = Seminario::find($id)->delete();
        //$usuarios = User::paginate(10);
        //return view('usuarios.index',compact('usuarios'));
        return redirect()->route('generarCursos')->with('success', 'Seminario eliminado exitosamente.');
    }

    public function agregar($id)
    {
        $seminario = Seminario::find($id);
        return view('seminario.agregar', compact('seminario'));
    }

    public function _agregar(Request $request, $id)
    {
        $data = $request->all();
    
        //Validar documentacion
        request()->validate([
            'name'      => 'required',
            'numero_modulo' => 'required|numeric',
            'contenido' => 'required',
        ], $data);

        // Datos del primer documento (campos fijos)
        $primerDocumento = $request->file('documento');
        $primerUrl = $request->input('url');
        
        // Datos de documentos adicionales (campos dinámicos)
        $documentosAdicionales = $request->file('documentos'); // Array de archivos
        $urlsAdicionales = $request->input('urls'); // Array de URLs

        $data_insert=array(
            'nombre'            => $data["name"],
            'numero_modulo'     => $data["numero_modulo"],
            'contenido'         => $data["contenido"],
            'documento'         => $primerDocumento ? $primerDocumento->store('documentos_modulo') : null,
            'url'               => $primerUrl
        );
        
        // Ejemplo de recorrido
        if ($documentosAdicionales) {
            foreach ($documentosAdicionales as $index => $documento) {
                $url = $urlsAdicionales[$index] ?? null;
                
            }
        }
    }

}
