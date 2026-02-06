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


class CursosController extends Controller
{   
    public function index()
    {
        $seminarios = Seminario::all();
        return view('cursos.index', compact('seminarios'));
    }

    
}
