<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacion;
use App\Models\Persona;
use App\Models\Documentos;
use App\Models\Modulo;
use App\Models\Modulos;
use App\Models\CapacitacionEncuesta;
use App\Models\CapacitacionPersona;
use App\Models\Seminario;
use App\Models\Respuesta;
use App\Models\ModuloUsuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

//Para sacar el Id del usuario
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MiscapacitacionController extends Controller
{
    public function index()
    {
        $seminarios = Seminario::with([
            'modulos.documentos',
            'modulos.respuestas',
            'ponente.fotografia',
        ])->orderBy('nombre', 'asc')->get();

        return view('miscapacitaciones.index', compact('seminarios'));
    }

    public function responderSeminario($seminarioId, $moduloId)
    {
        $seminario = Seminario::findOrFail($seminarioId);
        $modulo = Modulos::where('id_seminario', $seminarioId)
            ->where('id', $moduloId)
            ->firstOrFail();
        $preguntas = Respuesta::where('seminario_id', $seminarioId)
            ->where('modulo_id', $moduloId)
            ->get();

        $seminario->setRelation('respuestas', $preguntas);
        return view('miscapacitaciones.responder_seminario', compact('seminario', 'modulo'));
    }

    public function guardarRespuestasSeminario(Request $request, $seminarioId, $moduloId)
    {
        $seminario = Seminario::findOrFail($seminarioId);
        $modulo = Modulos::where('id_seminario', $seminarioId)
            ->where('id', $moduloId)
            ->firstOrFail();
        $preguntas = Respuesta::where('seminario_id', $seminarioId)
            ->where('modulo_id', $moduloId)
            ->get();
        $seminario->setRelation('respuestas', $preguntas);
        $respuestasUsuario = $request->input('respuestas', []);

        $total = $seminario->respuestas->count();
        $aciertos = 0;

        foreach ($seminario->respuestas as $pregunta) {
            $seleccion = $respuestasUsuario[$pregunta->id] ?? null;

            if ($seleccion !== null && (string) $seleccion === (string) $pregunta->respuesta_correcta) {
                $aciertos++;
            }
        }

        $porcentaje = $total > 0 ? round(($aciertos / $total) * 100, 2) : 0;

        // Guardar o actualizar el progreso del usuario (Falta implementacion...)
        if (Auth::check()) {
            ModuloUsuario::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'seminario_id' => $seminarioId,
                    'modulo_id' => $moduloId,
                ],
                [
                    'aciertos' => $aciertos,
                    'total_preguntas' => $total,
                    'calificacion' => $porcentaje,
                    'estatus' => 'completado',
                ]
            );
        }

        return view('miscapacitaciones.resultado_seminario', compact(
            'seminario', 'modulo', 'aciertos', 'total', 'porcentaje'
        ));
    }
}
