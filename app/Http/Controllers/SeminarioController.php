<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seminario;
use App\Models\Respuesta;
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


    public function respuestas($id)
    {
        $seminario = Seminario::findOrFail($id);
        $respuestas = Respuesta::where('seminario_id', $id)->get();

        return view('seminario.respuestas', compact('seminario', 'respuestas'));
    }


    public function crearRespuesta($id){
        $seminario = Seminario::findOrFail($id);
        return view('seminario.crear_respuesta', compact('seminario'));
    }

    public function guardarRespuesta(Request $request, $id)
    {
        $request->validate([
            'pregunta' => 'required|string',
            'respuestas' => 'required|array|size:4',
            'respuestas.*' => 'required|string',
            'respuesta_correcta' => 'required|integer|between:0,3',
            'oportunidades' => 'required|integer',
            'tiempo' => 'required|integer|min:5'
        ]);

        // Convertir minutos a formato HH:MM:SS
        $minutos = (int)$request->tiempo;
        $horas = intdiv($minutos, 60);
        $mins = $minutos % 60;
        $tiempoFormato = sprintf('%02d:%02d:00', $horas, $mins);

        Respuesta::create([
            'seminario_id' => $id,
            'modulo_id' => $request->modulo_id ?? 1,
            'oportunidades' => $request->oportunidades,
            'tiempo' => $tiempoFormato,
            'pregunta' => $request->pregunta,
            'respuestas' => json_encode($request->respuestas),
            'respuesta_correcta' => $request->respuesta_correcta
        ]);

        return redirect()
            ->route('respuestas', $id)
            ->with('success', 'Pregunta guardada correctamente');
    }

    public function editarRespuesta($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $seminario = Seminario::findOrFail($respuesta->seminario_id);
        
        return view('seminario.editar_respuesta', compact('respuesta', 'seminario'));
    }

    public function actualizarRespuesta(Request $request, $id)
    {
        $respuesta = Respuesta::findOrFail($id);
        
        $request->validate([
            'pregunta' => 'required|string',
            'respuestas' => 'required|array|size:4',
            'respuestas.*' => 'required|string',
            'respuesta_correcta' => 'required|integer|between:0,3',
            'oportunidades' => 'required|integer',
            'tiempo' => 'required|integer|min:5'
        ]);

        // Convertir minutos a formato HH:MM:SS
        $minutos = (int)$request->tiempo;
        $horas = intdiv($minutos, 60);
        $mins = $minutos % 60;
        $tiempoFormato = sprintf('%02d:%02d:00', $horas, $mins);

        $respuesta->update([
            'oportunidades' => $request->oportunidades,
            'tiempo' => $tiempoFormato,
            'pregunta' => $request->pregunta,
            'respuestas' => json_encode($request->respuestas),
            'respuesta_correcta' => $request->respuesta_correcta
        ]);

        return redirect()
            ->route('respuestas', $respuesta->seminario_id)
            ->with('success', 'Pregunta actualizada correctamente');
    }

    public function eliminarRespuesta($id)
    {
        $respuesta = Respuesta::findOrFail($id);
        $seminarioId = $respuesta->seminario_id;
        $respuesta->delete();

        return redirect()->route('respuestas', $seminarioId)->with('success', 'Pregunta eliminada correctamente');
    }
}
