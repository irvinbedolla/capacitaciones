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


class ModulosController extends Controller
{   
    public function index($id)
    {
        $modulos = Modulos::all();
        $modulos_documentos = ModulosDocumentos::all();
        $seminario = Seminario::find($id);
        return view('modulos.index', compact('modulos', 'modulos_documentos', 'seminario'));
    }

    public function store(Request $request, $moduloId)
    {
        $request->validate([
            'archivo' => 'nullable|file|mimes:pdf|max:10240',
            'url'     => 'nullable|url',
        ]);

        if ($request->hasFile('archivo')) {
            $indicePdf = ModulosDocumentos::where('modulo_id', $moduloId)->count() + 1;
            $nombreArchivo = time() . '_' . $indicePdf . '_' . $request->file('archivo')->getClientOriginalName();
            $request->file('archivo')->storeAs('documentos', $nombreArchivo, 'public');

            ModulosDocumentos::create([
                'modulo_id' => $moduloId,
                'nombre'    => $nombreArchivo,
            ]);
        } elseif ($request->filled('url')) {
            ModulosDocumentos::create([
                'modulo_id' => $moduloId,
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
            $indicePdf = ModulosDocumentos::where('modulo_id', $doc->modulo_id)->count();
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

}
