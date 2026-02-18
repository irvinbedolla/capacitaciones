<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Seminario;
use App\Models\Respuesta;
use App\Models\Modulos;
use App\Models\ModulosDocumentos;
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
                'fecha_final'       => $input["end_date"],
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

        // Validar campos básicos
        $request->validate([
            'name'          => 'required|string|max:255',
            'numero_modulo' => 'required|numeric',
            'contenido'     => 'required|string',
            'estado'        => 'required|in:pendiente,evaluado',
            'tipo_recursos' => 'required|array|min:1',
            'tipo_recursos.*' => 'required|in:pdf,url',
        ]);

        try {
            DB::beginTransaction();

            // Insertar en tabla modulos
            $modulo = Modulos::create([
                'id_seminario'  => $id,
                'numero_modulo' => $request->numero_modulo,
                'nombre'        => $request->name,
                'contenido'     => $request->contenido,
                'id_ponente'    => 1, // Id de ponente de prueba
                'status'        => $request->estado
            ]);

            // Procesar recursos dinámicos
            $tiposRecursos = $request->input('tipo_recursos');
            $recursosPdf = $request->file('recursos_pdf') ?? [];
            $recursosUrl = $request->input('recursos_url') ?? [];
            
            $indicePdf = 0;
            $indiceUrl = 0;
            
            foreach ($tiposRecursos as $index => $tipo) {
                $documentoData = [
                    'id_modulo'     => $modulo->id,
                    'id_seminario'  => $id,
                    'tipo'          => $tipo
                ];

                if ($tipo === 'pdf' && isset($recursosPdf[$indicePdf])) {
                    // Guardar el archivo PDF
                    $archivo = $recursosPdf[$indicePdf];
                    $nombreArchivo = time() . '_' . $indicePdf . '_' . $archivo->getClientOriginalName();
                    $rutaPdf = $archivo->storeAs('documentos_modulo', $nombreArchivo, 'public');
                    
                    $documentoData['nombre'] = $nombreArchivo;
                    
                    ModulosDocumentos::create($documentoData);
                    
                    $indicePdf++;
                } elseif ($tipo === 'url' && isset($recursosUrl[$indiceUrl])) {
                    $documentoData['nombre'] = $recursosUrl[$indiceUrl];
                    
                    ModulosDocumentos::create($documentoData);
                    
                    $indiceUrl++;
                }
            }

            DB::commit();

            return redirect()
                ->route('generarCursos')
                ->with('success', 'Módulo y recursos agregados exitosamente.');

        } catch (\Exception $e) {
            DB::rollBack();
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al guardar el módulo: ' . $e->getMessage());
        }
    }


    public function respuestas($id)
    {
        $seminario = Seminario::findOrFail($id);
        $modulos = Modulos::where('id_seminario', $id)->get();
        $respuestas = Respuesta::where('seminario_id', $id)->get();

        return view('seminario.respuestas', compact('seminario', 'modulos', 'respuestas'));
    }


    public function crearRespuesta($id){
        $seminario = Seminario::findOrFail($id);
        $modulos = Modulos::where('id_seminario', $id)->get();
        return view('seminario.crear_respuesta', compact('seminario', 'modulos'));
    }

    public function guardarRespuesta(Request $request, $id)
    {
        $request->validate([
            'pregunta' => 'required|string',
            'respuestas' => 'required|array|size:4',
            'respuestas.*' => 'required|string',
            'respuesta_correcta' => 'required|integer|between:0,3',
            'modulo_id' => 'required|exists:modulos,id'
        ]);

        Respuesta::create([
            'seminario_id' => $id,
            'modulo_id' => $request->modulo_id,
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
        $modulos = Modulos::where('id_seminario', $seminario->id)->get();
        
        return view('seminario.editar_respuesta', compact('respuesta', 'seminario', 'modulos'));
    }

    public function actualizarRespuesta(Request $request, $id)
    {
        $respuesta = Respuesta::findOrFail($id);
        
        $request->validate([
            'pregunta' => 'required|string',
            'respuestas' => 'required|array|size:4',
            'respuestas.*' => 'required|string',
            'respuesta_correcta' => 'required|integer|between:0,3',
            'modulo_id' => 'required|exists:modulos,id'
        ]);

        $respuesta->update([
            'modulo_id' => $request->modulo_id,
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
