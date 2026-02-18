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
        $seminarios = Seminario::orderBy('id', 'desc')->get();
        return view('miscapacitaciones.index', compact('seminarios'));
    }

    public function responderSeminario($id)
    {
        $seminario = Seminario::findOrFail(1);
        $modulo = Modulos::where('id_seminario', 1)
            ->where('numero_modulo', 1)
            ->first();
        $preguntas = Respuesta::where('seminario_id', 1)
            ->where('modulo_id', 1)
            ->get();
        $seminario->setRelation('respuestas', $preguntas);
        return view('miscapacitaciones.responder_seminario', compact('seminario', 'modulo'));
    }

    public function guardarRespuestasSeminario(Request $request, $id)
    {
        $seminario = Seminario::findOrFail(1);
        $preguntas = Respuesta::where('seminario_id', 1)
            ->where('modulo_id', 1)
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

        return view('miscapacitaciones.resultado_seminario', compact('seminario', 'aciertos', 'total', 'porcentaje'));
    }
}
