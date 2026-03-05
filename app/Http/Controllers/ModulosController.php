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
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;


class ModulosController extends Controller
{   
    public function index($id)
    {
        $seminario = Seminario::findOrFail($id);
        $modulos = Modulos::where('id_seminario', $id)
                          ->with('documentos')
                          ->orderBy('numero_modulo')
                          ->get();
        return view('modulos.index', compact('modulos', 'seminario'));
    }

    public function store(Request $request, $moduloId)
    {
        $request->validate([
            'archivo' => 'nullable|file|mimes:pdf|max:10240',
            'url'     => 'nullable|url',
        ]);

        $modulo = Modulos::findOrFail($moduloId);

        if ($request->hasFile('archivo')) {
            $indicePdf = ModulosDocumentos::where('id_modulo', $moduloId)->count() + 1;
            $nombreArchivo = time() . '_' . $indicePdf . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('documentos', $nombreArchivo, 'public');

            ModulosDocumentos::create([
                'id_modulo' => $moduloId,
                'id_seminario' => $modulo->id_seminario,
                'nombre'    => $nombreArchivo,
            ]);
        } elseif ($request->filled('url')) {
            ModulosDocumentos::create([
                'id_modulo' => $moduloId,
                'id_seminario' => $modulo->id_seminario,
                'nombre'    => $request->url,
            ]);
        }

        return back()->with('success', 'Recurso agregado correctamente.');
    }

    public function update(Request $request, $docId)
    {
        $request->validate([
            'archivo' => 'nullable|file|mimes:pdf|max:10240',
            'url'     => 'nullable|url',
        ]);

        $doc = ModulosDocumentos::findOrFail($docId);

        if ($request->hasFile('archivo')) {
            // Eliminar archivo anterior si no es URL
            if (!filter_var($doc->nombre, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete('documentos/' . $doc->nombre);
            }
            $indicePdf = ModulosDocumentos::where('id_modulo', $doc->id_modulo)->count();
            $nombreArchivo = time() . '_' . $indicePdf . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('documentos', $nombreArchivo, 'public');
            $doc->update(['nombre' => $nombreArchivo]);
        } elseif ($request->filled('url')) {
            if (!filter_var($doc->nombre, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete('documentos/' . $doc->nombre);
            }
            $doc->update(['nombre' => $request->url]);
        }

        return back()->with('success', 'Recurso actualizado correctamente.');
    }

    public function destroy($docId)
    {
        $doc = ModulosDocumentos::findOrFail($docId);

        if (!filter_var($doc->nombre, FILTER_VALIDATE_URL)) {
            Storage::disk('public')->delete('documentos/' . $doc->nombre);
        }

        $doc->delete();

        return back()->with('success', 'Recurso eliminado correctamente.');
    }

    public function destroyModulo($moduloId)
    {
        $modulo = Modulos::findOrFail($moduloId);
        $seminarioId = $modulo->id_seminario;

        // Eliminar todos los documentos del módulo
        $documentos = ModulosDocumentos::where('id_modulo', $moduloId)->get();
        foreach ($documentos as $doc) {
            if (!filter_var($doc->nombre, FILTER_VALIDATE_URL)) {
                Storage::disk('public')->delete('documentos/' . $doc->nombre);
            }
            $doc->delete();
        }

        $modulo->delete();

        return redirect()->route('verModulos', $seminarioId)->with('success', 'Módulo eliminado correctamente.');
    }

}
