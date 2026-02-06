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
}
