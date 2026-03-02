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

        // Obtener el progreso del usuario autenticado para todos los módulos
        $progreso = collect();
        if (Auth::check()) {
            $progreso = ModuloUsuario::where('user_id', Auth::id())
                ->get()
                ->keyBy(function ($item) {
                    return $item->seminario_id . '-' . $item->modulo_id;
                });
        }

        return view('miscapacitaciones.index', compact('seminarios', 'progreso'));
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

        // Verificar intentos disponibles y restar un intento al entrar
        $maxIntentos = $modulo->max_intentos ?? 2;
        $tiempoLimite = $modulo->tiempo_limite ?? 50;
        $intentosUsados = 0;

        if (Auth::check()) {
            $progresoUsuario = ModuloUsuario::where('user_id', Auth::id())
                ->where('seminario_id', $seminarioId)
                ->where('modulo_id', $moduloId)
                ->first();

            if ($progresoUsuario) {
                $intentosUsados = $progresoUsuario->intentos;
            }
        }

        $intentosRestantes = $maxIntentos - $intentosUsados;

        // Si ya no tiene intentos, redirigir
        if ($intentosRestantes <= 0) {
            return redirect()->route('miscapacitaciones')
                ->with('error', 'Ya no tienes intentos disponibles para el cuestionario del módulo: ' . $modulo->nombre);
        }

        // Restar un intento al entrar al cuestionario
        if (Auth::check()) {
            $registro = ModuloUsuario::firstOrCreate(
                [
                    'user_id' => Auth::id(),
                    'seminario_id' => $seminarioId,
                    'modulo_id' => $moduloId,
                ],
                [
                    'aciertos' => 0,
                    'total_preguntas' => 0,
                    'calificacion' => 0,
                    'estatus' => 'pendiente',
                    'intentos' => 0,
                ]
            );
            
            $registro->intentos = ($registro->intentos ?? 0) + 1;
            $registro->save();

            $intentosRestantes = $maxIntentos - $registro->intentos;
        }

        $seminario->setRelation('respuestas', $preguntas);
        return view('miscapacitaciones.responder_seminario', compact(
            'seminario', 'modulo', 'tiempoLimite', 'intentosRestantes'
        ));
    }

    public function guardarRespuestasSeminario(Request $request, $seminarioId, $moduloId)
    {
        $seminario = Seminario::findOrFail($seminarioId);
        $modulo = Modulos::where('id_seminario', $seminarioId)
            ->where('id', $moduloId)
            ->firstOrFail();

        // verificar que exista el registro
        $maxIntentos = $modulo->max_intentos ?? 2;
        $intentosRestantes = $maxIntentos;

        if (Auth::check()) {
            $progresoUsuario = ModuloUsuario::where('user_id', Auth::id())
                ->where('seminario_id', $seminarioId)
                ->where('modulo_id', $moduloId)
                ->first();

            if (!$progresoUsuario) {
                return redirect()->route('miscapacitaciones')
                    ->with('error', 'Debes entrar al cuestionario primero.');
            }
        }

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

        // Actualizar progreso del usuario
        if (Auth::check()) {
            $registro = ModuloUsuario::where('user_id', Auth::id())
                ->where('seminario_id', $seminarioId)
                ->where('modulo_id', $moduloId)
                ->first();

            $registro->aciertos = $aciertos;
            $registro->total_preguntas = $total;
            $registro->calificacion = $porcentaje;
            $registro->estatus = 'completado';
            $registro->save();

            $intentosRestantes = $maxIntentos - $registro->intentos;
        }

        return view('miscapacitaciones.resultado_seminario', compact(
            'seminario', 'modulo', 'aciertos', 'total', 'porcentaje', 'intentosRestantes'
        ));
    }
}
