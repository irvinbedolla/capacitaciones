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


class ModuloController extends Controller
{   
    public function index($id)
    {
        $modulos = Modulos::all();
        $modulos_documentos = ModulosDocumentos::all();
        $seminario = Seminario::find($id);
        return view('modulos.index', compact('modulos', 'modulos_documentos', 'seminario'));
    }

}
