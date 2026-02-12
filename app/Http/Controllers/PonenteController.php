<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ponente;
use App\Models\Fotografia;
use App\Models\Persona;
use App\Models\User;



class PonenteController extends Controller{

     public function index()
    {
        
        
        $id      = auth()->user()->id;
        $usuario = User::find($id);
        $rol     = $usuario->getRoleNames()->first();
        $persona = Persona::where('id_usuario', $id)->get();
        $ponentes=[];
        $user = auth()->user();
        $userRole = $user->roles->pluck('name')->all();
        //dd($userRole);
        $ponentes = Ponente::all();
        if($userRole[0] == 'Super Usuario'){
            
            return view('ponentes.index', compact('persona','ponentes','rol'));
        }
        $fotografias = Fotografia::all();
        return view('ponentes.index_normal', compact('ponentes','fotografias'));
    }

    public function edit($id)
    {
        $ponente = Ponente::where(['id_usuario' => $id])->first();
        $id_ponente= $ponente->id;
        $fotografia = Fotografia::where('id_ponente',$id_ponente)->first();
        return view('ponentes.edit', compact('ponente','fotografia'));
    }
    public function create()
    {
        
        $ponentes_lista = User::whereHas('roles', function ($query) {
                    $query->where('name', 'Ponente');
                })
                ->select('users.id', 'users.name')->get();
        
        $ponentes_registrados= Ponente::pluck('id_usuario');

        $ponentes = $ponentes_lista->whereNotIn('id', $ponentes_registrados);

        return view('ponentes.crear', compact('ponentes'));
        
        
        
    }
    
    public function store(Request $request)
    {
        $id = auth()->user()->id;
        
        $data = $request->all();
        
        //Validar documentacion
        /*request()->validate([
            'nombre'      => 'required',
            'semblanza'     => 'required',
            'nombre_fotografia' =>'required|string|max:255',

        ], $data);*/

        if(isset($data["fotografia"])){
                $nombre_foto = $data["nombre"].".jpg";
                $path = Storage::putFileAs(
                    'ponentes', $request->file('fotografia'), $nombre_foto
                );
            }
        $data_ponente=array(
                'id_usuario'            => $data["id_usuario"],
                'nombre'                => $data["nombre"],
                'semblanza'             => $data["semblanza"],          
        );
        
        Ponente::create($data_ponente);
        $id_ponente= Ponente::where(['id_usuario' => $data['id_usuario']])->first();
        
        
        $data_fotografia=array(
                'id_ponente'            => $id_ponente["id"],
                'nombre_foto'                => $data["nombre_foto"],
                'fotografia'                 => $nombre_foto          
                );
        Fotografia::create($data_fotografia);

        return redirect()->route('ponentes')->with('success', 'Datos actualizados correctamente.');

    }

    public function destroy($id)
    {
        $ponente = Ponente::where(['id_usuario' => $id])->first();
        $id_ponente= $ponente->id;
        $foto = Fotografia::where('id_ponente',$id_ponente)->first();
        if($foto){
            $path = storage_path('app/ponentes/'.$foto->fotografia);
            unlink($path);
        }
        $foto -> delete();
        $ponente->delete();


        return redirect()->back();
    }
    public function update(Request $request, $id)
    {

        //Hacemos un condicional sobre los inputs que tenemos
        $input = $request->all();
        
        $ponente = Ponente::find($id);
        $id_ponente= $ponente->id;
        $foto = Fotografia::where('id_ponente',$id_ponente)->first();

        $ponente->update([
            'nombre' => $input["nombre"],
            'semblanza' => $input["semblanza"] 
        ]);
        
        if(isset($input["foto"])){
            
                $nombre_foto = $input["nombre"].".jpg";
                $path = Storage::putFileAs(
                    'ponentes', $request->file('fotografia'), $nombre_foto
                );
                $foto->update([
                    'fotografia' => $nombre_foto 
                ]);
        }

        return redirect()->route('ponentes');
    }
 
}

?>