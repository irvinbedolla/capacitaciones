<?php


use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PDFController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\SeminarioController;
use App\Http\Controllers\CapacitacionController;
use App\Http\Controllers\MiscapacitacionController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CorreosController;
use App\Http\Controllers\PonenteController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

    //Ruta Raiz
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/logon', function () {
        return view('../public/welcome');
    });

    Route::get('create',                    [UsuarioController::class, 'crear'])->name('users.create');
    Route::post('/usuarios/guardar',        [UsuarioController::class, 'store_public'])->name('store_public');
    Route::get('ponentes',                  [HomeController::class, 'ponentes'])->name('ponentes');
    Route::get('/',                         [HomeController::class, 'publico'])->name('publico');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/agenda', [DashboardController::class, 'index'])->name('agenda');
    //Rutas de los menus
        Route::get('/usuarios/index',           [UsuarioController::class, 'index'])->name('usuarios');
        Route::get('/roles/index',              [RolController::class, 'index'])->name('roles');
        Route::get('/capacitaciones/indexr',     [CapacitacionController::class, 'index'])->name('capacitaciones');
        Route::get('/miscapacitaciones/index',  [MiscapacitacionController::class, 'index'])->name('miscapacitaciones');
        Route::get('/expedientes/index',        [ExpedienteController::class, 'index'])->name('expedientes');
        Route::get('/seer/index',               [SeerController::class, 'index'])->name('seer');
        Route::get('/poderes/index',            [PoderController::class, 'index'])->name('poderes');
        Route::get('/seer/estadistica',         [SeerController::class, 'estadistica'])->name('seer.estadistica');
        Route::get('/turnos/index',             [RecepcionController::class, 'index_turnos'])->name('turnos');
        Route::get('/turnos/misturnos',         [RecepcionController::class, 'misturnos'])->name('misturnos');
        Route::get('/turnos/estadistica',       [TurnosController::class, 'estadistica'])->name('turno_estadistica');
        Route::get('/notificaciones/index',     [SeerController::class, 'notificaciones'])->name('notificaciones');
        Route::get('/solicitudes/home',         [SeerController::class, 'solicitudes'])->name('solicitudes_index');
        Route::get('/ratificaciones/index',     [TurnosController::class, 'index_ratificacion'])->name('index_ratificacion');
    //Fin de ruta de los menus
    //Usuarios
        Route::get('/usuarios/index',           [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::get('/usuarios/index',           [UsuarioController::class, 'index'])->name('usuarios');
        Route::get('/usuarios/create',          [UsuarioController::class, 'create'])->name('usuarios.create');
        Route::get('/usuarios/edit/{id}',       [UsuarioController::class, 'edit'])->name('usuarios.edit');
        Route::post('/usuarios/store',          [UsuarioController::class, 'store'])->name('usuarios.store');
        Route::patch('/usuarios/update/{post}', [UsuarioController::class, 'update'])->name('usuarios.update');
        Route::delete('/usuarios/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
    //Fin de usuarios
    //Roles
        Route::get('/roles/index',           [RolController::class, 'index'])->name('roles.index');
        Route::get('/roles/index',           [RolController::class, 'index'])->name('roles');
        Route::get('/roles/create',          [RolController::class, 'create'])->name('roles.create');
        Route::get('/roles/edit/{id}',       [RolController::class, 'edit'])->name('roles.edit');
        Route::post('/roles/guardar',        [RolController::class, 'store_rol'])->name('roles.store');
        Route::patch('/roles/update/{post}', [RolController::class, 'update'])->name('roles.update');
        Route::delete('/roles/destroy/{id}', [RolController::class, 'destroy'])->name('roles.destroy');
    //Fin roles
    
    //Capacitaciones
        Route::get('/capacitaciones/index1',                         [CapacitacionController::class, 'index'])->name('capacitaciones.index');
        Route::get('/capacitaciones/index2',                         [CapacitacionController::class, 'index'])->name('capacitaciones');
        Route::get('/capacitaciones/create',                        [CapacitacionController::class, 'create'])->name('capacitaciones.create');
        Route::get('/capacitaciones/edit/{id}',                     [CapacitacionController::class, 'edit'])->name('capacitaciones.edit');
        Route::post('/capacitaciones/guardar_capacitacion',         [CapacitacionController::class, 'crear_capacitacion'])->name('crear_capacitacion');
        Route::patch('/capacitaciones/update/{post}',               [CapacitacionController::class, 'update'])->name('capacitaciones.update');
        Route::delete('/capacitaciones/destroy/{id}',               [CapacitacionController::class, 'destroy'])->name('capacitaciones.destroy');

        Route::get('/capacitaciones/personas',                      [CapacitacionController::class, 'personas'])->name('capacitaciones.personas');
        Route::get('/capacitaciones/personas_documentos/{id}',      [CapacitacionController::class, 'personas_documentos'])->name('personas.documentos');
        Route::get('/capacitaciones/modulos/{id}',                  [CapacitacionController::class, 'modulos'])->name('capacitaciones.modulos');
        Route::get('/capacitaciones/crear_modulo/{id}',             [CapacitacionController::class, 'crear_modulo'])->name('capacitaciones.nuevo_modulo');
        Route::get('/capacitaciones/borrar_modulo//{id}/{mod}',     [CapacitacionController::class, 'borrar_modulo'])->name('capacitaciones.borrar');
        Route::get('/capacitaciones/editar_modulo/{id}',            [CapacitacionController::class, 'editar_modulo'])->name('capacitaciones.editar_modulo');
        Route::get('/capacitaciones/editar_encuesta/{id}/{mod}',    [CapacitacionController::class, 'editar_encuesta'])->name('capacitaciones.editar_encuesta');
        Route::get('/capacitaciones/agregar_personas/{id}',         [CapacitacionController::class, 'agregar_personas'])->name('capacitaciones.addpersonas');
        Route::get('/capacitaciones/persona_incluir/{cap}/{per}',   [CapacitacionController::class, 'persona_incluir'])->name('capacitaciones.agregar_persona');
        Route::get('/capacitaciones/persona_quitar/{cap}/{per}',    [CapacitacionController::class, 'persona_quitar'])->name('capacitaciones.quitar_persona');
        Route::get('/capacitaciones/personas_calificacion/{cap}',   [CapacitacionController::class, 'personas_calificacion'])->name('capacitaciones.calificaciones');    
        Route::post('/capacitaciones/guardar_encuesta_editar',      [CapacitacionController::class, 'guardar_encuesta_editar'])->name('capacitaciones.guardar_encuesta_editar');
        Route::post('/capacitaciones/guardar_modulo',               [CapacitacionController::class, 'guardar_modulo'])->name('capacitaciones.crear_modulo');
        Route::post('/capacitaciones/guardar_modulo_editar',        [CapacitacionController::class, 'guardar_modulo_editar'])->name('capacitaciones.editar_modulo_guardar');
        Route::get('/capacitaciones/terminar/{id}',                 [CapacitacionController::class, 'terminar'])->name('capacitaciones.terminado');
        Route::get('/capacitaciones/terminar/{id}',                 [CapacitacionController::class, 'terminar'])->name('capacitaciones.terminado');
    //Fin capacitaciones    
    //Mis Capacitaciones
        Route::get('/miscapacitaciones/index',                      [MiscapacitacionController::class, 'index'])->name('miscapacitaciones');
        Route::get('/miscapacitaciones/seminario/{id}/responder',   [MiscapacitacionController::class, 'responderSeminario'])->name('miscapacitaciones.responder_seminario');
        Route::post('/miscapacitaciones/seminario/{id}/responder',  [MiscapacitacionController::class, 'guardarRespuestasSeminario'])->name('miscapacitaciones.guardar_respuestas_seminario');
    //Fin mis capacitaciones
    //Expedientes
        Route::get('/expedientes/index',                        [ExpedienteController::class, 'index'])->name('expedientes.index');
        Route::get('/expedientes/index',                        [ExpedienteController::class, 'index'])->name('expedientes');
        Route::get('/expedientes/edit/{id}',                    [ExpedienteController::class, 'edit'])->name('expedientes.edit');
        Route::get('/expedientes/doc/{id}',                     [ExpedienteController::class, 'documento'])->name('expedientes.documento');
        Route::get('/expedientes/create',                       [ExpedienteController::class, 'create'])->name('expedientes.create');
        Route::post('/expedientes/store',                       [ExpedienteController::class, 'store'])->name('expedientes.store');
        Route::get('/expedientes/documentos/{id}',              [ExpedienteController::class, 'personas_documentos'])->name('expedientes.documentos');
        Route::post('/expedientes/doc',                         [ExpedienteController::class, 'store_documento'])->name('subir_doc');
        Route::delete('/expedientes/destroy/{id}',              [ExpedienteController::class, 'destroy'])->name('expedientes.delete');
    //Fin de Expedientes
        Route::get('/ponentes/index',                           [PonenteController::class, 'index'])->name('ponentes.index');
        Route::get('/ponentes/index',                           [PonenteController::class, 'index'])->name('ponentes');
        Route::get('/ponentes/edit/{id}',                       [PonenteController::class, 'edit'])->name('ponentes.edit');
        Route::post('/ponentes/store',                          [PonenteController::class, 'store'])->name('ponentes.store');
        Route::get('/ponentes/create',                          [PonenteController::class, 'create'])->name('ponentes.create');
        Route::get('/ponentes/images',                          [PonenteController::class, 'store_image'])->name('ponentes.guardar_foto');
        Route::delete('/ponentes/destroy/{id}',                 [PonenteController::class, 'destroy'])->name('ponentes.delete');
        Route::patch('/ponentes/update/{post}',                 [PonenteController::class, 'update'])->name('ponentes.update');




    //Cambiar las contraseña
        Route::get('/cambio_contraseña/index',  [HomeController::class, 'password_cambiar'])->name('password_cambiar');
        Route::post('/notificaciones/editar',   [HomeController::class, 'contraseña_update'])->name('contraseña_update'); 

    //Fin de cambiar las contraseña
    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    //Seminarios
        Route::get('/seminario/index',                  [SeminarioController::class, 'index'])->name('generarCursos');
        Route::get('/seminario/crear',                  [SeminarioController::class, 'crear'])->name('nuevoSeminario');
        Route::post('/seminario/guardar',               [SeminarioController::class, 'guardar'])->name('seminarios.guardar');
        Route::delete('/seminario/eliminar/{id}',       [SeminarioController::class, 'eliminar'])->name('eliminarSeminario');
        Route::get('/seminario/editar/{id}',            [SeminarioController::class, 'editar'])->name('editarSeminario');
        Route::patch('/seminario/actualizar/{id}',    [SeminarioController::class, 'actualizar'])->name('seminarios.actualizar');
        Route::get('/seminario/respuestas/{id}',      [SeminarioController::class, 'respuestas'])->name('respuestas');
        Route::get('/seminario/{id}/crear_respuesta', [SeminarioController::class, 'crearRespuesta'])->name('crearRespuesta');
        Route::post('/seminario/{id}/respuestas/guardar', [SeminarioController::class, 'guardarRespuesta'])->name('guardarRespuesta');
        Route::get('/seminario/respuestas/{id}/editar', [SeminarioController::class, 'editarRespuesta'])->name('respuestas.editar');
        Route::patch('/seminario/respuestas/{id}/actualizar', [SeminarioController::class, 'actualizarRespuesta'])->name('respuestas.actualizar');
        Route::delete('/seminario/respuestas/{id}',   [SeminarioController::class, 'eliminarRespuesta'])->name('respuestas.eliminar');
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';

//Devuelve el conteo de registros pendientes de firma para el usuario logueado
Route::middleware(['auth', 'throttle:120,1'])->get('/poll/pendiente-firma', function () {
    $userId = Auth::id();
    $count = 0;
    if ($userId) {
        $count = SeerPerGeneral::query()
            ->where('pendiente_firma', 'Si')
            ->where('conciliador_id', $userId)
            ->count();
    }
    return response()->json(['count' => (int) $count]);
})->name('poll.pendiente_firma');
