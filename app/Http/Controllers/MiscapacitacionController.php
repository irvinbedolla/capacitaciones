<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capacitacion;
use App\Models\Persona;
use App\Models\Documentos;
use App\Models\Modulo;
use App\Models\CapacitacionEncuesta;
use App\Models\CapacitacionPersona;
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
        //Paginar las personas
        //$capacitaciones = Capacitacion::all();
        return view('miscapacitaciones.index');
    }
}
