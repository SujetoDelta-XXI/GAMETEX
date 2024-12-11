<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TorneosController;
use App\Http\Controllers\user\UserDashController;

use App\Http\Controllers\torneos\PanelTorneoController;

use App\Http\Controllers\moder\ModerDashController;

use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\admin\AeventoController;
use App\Http\Controllers\admin\AtorneoController;
use App\Http\Controllers\ProfilePhotoController;
use App\Http\Controllers\admin\RecompensasController;
use App\Http\Controllers\admin\UsuariosController;
use App\Http\Controllers\user\RecompensaController;

use App\Http\Controllers\EventoController;
use App\Http\Controllers\admin\RecompensasTorneosController;
use App\Http\Controllers\eventos\PanelEventController;

use App\Models\RecompensasModel;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\QuickLoginController;
use App\Http\Controllers\UserDiscordController;


#Route::get('/', function () {
#return view('welcome');
#});

Route::get('usuarios', function () {
    return view('usuarios');
});

/* Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'auth.user'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
        
    })->name('dashboard');
    Route::get('dashboard', [UserDashController::class, 'index'])->name('dashboard');
}); */

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.attempt');
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
    ->name('register');
Route::post('/register', [RegisterController::class, 'register']);

///////////////////////////////////////////////////////////////////////////
/////////////////////////////// user /////////////////////////////////////
Route::middleware(['auth.user'])->group(function () {
    Route::get('dashboard', [UserDashController::class, 'index'])->name('dashboard');
    Route::get('profile-show', [UserDashController::class, 'show'])->name('profile-show');
    Route::get('users-torneos', [UserDashController::class, 'torneos'])->name('users-torneos');
    Route::get('users-recompensas', [RecompensaController::class, 'showUserRecompensas'])->name('users-recompensas');
    Route::post('recompensa/updateEstado', [RecompensaController::class, 'updateEstado'])->name('recompensa.updateEstado');  
    Route::get('users-perfil', [UserDashController::class, 'index'])->name('users-perfil');
    Route::get('users-eventos', [UserDashController::class, 'eventos'])->name('users-eventos');

    Route::prefix('/torneo/{id}')->group(function () {
        Route::get('panel', [PanelTorneoController::class, 'index'])->name('torneos-panel');
        Route::get('descripcion', [PanelTorneoController::class, 'descripcion'])->name('torneos-descripcion');
        Route::get('partidas', [PanelTorneoController::class, 'partidas'])->name('torneos-partidas');
        Route::get('equipos', [PanelTorneoController::class, 'equipos'])->name('torneos-equipos');
    });
    




    /* Route::get('torneos-register', [TorneosController::class, 'register'])->name('torneos-register'); */
    Route::get('torneos-register/{id}', [TorneosController::class, 'registerId'])->name('torneos-registerId');
    Route::post('setDiscord/{id}',[UserDiscordController::class, 'setDiscord'])->name('setDiscord');
    Route::get('eventos-register', [EventoController::class, 'register'])->name('eventos-register');

    Route::get('eventos-detalle', [PanelEventController::class, 'detalle'])->name('evento-detalle');
    Route::get('eventos-ranking', [PanelEventController::class, 'ranking'])->name('evento-ranking');
});

///////////////////////////////////////////////////////////////////////////
/////////////////////////////// moder /////////////////////////////////////
Route::middleware(['auth.moder'])->group(function () {
    Route::get('moder/dashboard', [ModerDashController::class, 'index'])->name('moder.dashboard');
});

///////////////////////////////////////////////////////////////////////////
/////////////////////////////// admin /////////////////////////////////////

Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/dashboard', [AdminDashController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin/crud')->name('admin.crud.')->group(function () {
        /////////////////////////////// evento /////////////////////////////////////
        Route::get('evento', [AeventoController::class, 'show'])->name('evento');
        Route::get('evento/create', [AeventoController::class, 'create'])->name('evento.create');
        Route::get('evento-edit/{id}/edit', [AeventoController::class, 'editEventos'])->name('evento.edit');
        Route::delete('evento/{id}', [AeventoController::class, 'deleteEventos'])->name('evento.delete');
        Route::get('evento/search', [AeventoController::class, 'search'])->name('evento.search');
        Route::post('evento/store', [AeventoController::class, 'store'])->name('evento.store');
        /////////////////////////////// evento /////////////////////////////////////
        Route::get('torneo', [AtorneoController::class, 'show'])->name('torneo');
        Route::get('torneo/create', [AtorneoController::class, 'create'])->name('torneo.create');
        Route::post('torneo/store', [AtorneoController::class, 'store'])->name('torneo.store');
        Route::get('torneo-edit/{id}/edit', [AtorneoController::class, 'editTorneos'])->name('torneo.edit');
        Route::put('torneo/{id}', [AtorneoController::class, 'updateTorneos'])->name('torneo.update');
        Route::delete('torneo/{id}', [AtorneoController::class, 'deleteTorneos'])->name('torneo.delete');
        Route::get('torneo/search', [AtorneoController::class, 'search'])->name('torneo.search');
        /////////////////////////////// Recompensa /////////////////////////////////////
        Route::get('recompensas', [RecompensasController::class, 'showListado'])->name('recompensas');
        Route::post('recompensa/store', [RecompensasController::class, 'store'])->name('recompensa.store');
        Route::post('recompensa', [RecompensasController::class, 'store'])->name('recompensa.store');
        Route::post('/recompensas/asignar', [RecompensaController::class, 'asignar'])->name('asignar');
        Route::get('recompensa/{id}/edit', [RecompensasController::class, 'edit'])->name('recompensa.edit');
        Route::put('recompensa/{id}', [RecompensasController::class, 'update'])->name('recompensa.update');
        Route::delete('recompensa/{id}', [RecompensasController::class, 'delete'])->name('recompensa.delete');
        Route::get('/recompensas/eventos/{id}', [RecompensasController::class, 'showEvento'])->name('recompensasEventos');
        Route::get('/recompensas/torneos/{id}', [RecompensasTorneosController::class, 'showTorneo'])->name('recompensasTorneos');
        Route::get('/recompensas/torneos/search', [RecompensasTorneosController::class, 'searchTorneo'])->name('searchTorneo');
        Route::get('/recompensas/torneos/{id}/equipos', [RecompensasTorneosController::class, 'getEquipos'])->name('getEquipos');


        Route::get('usuarios', [UsuariosController::class, 'showListado'])->name('usuarios');
        Route::post('/usuario/detalles', [UsuariosController::class, 'getUsuarioDetalles'])->name('usuario.detalles');

    });
});




///////////////////////////////////////////////////////////////////////////
/////////////////////////////// HOME /////////////////////////////////////

Route::get('/', [HomeController::class, 'index']);

Route::get('torneos', [TorneosController::class, 'index']);


Route::get('f_nosotros', [HomeController::class, 'fNosotros']);
Route::get('f_torneos', [HomeController::class, 'fTorneos']);
Route::get('f_eventos', [HomeController::class, 'fEventos']);

Route::get('f_poli_privacidad', [HomeController::class, 'fPoliticasPrivacidad']);
Route::get('f_termin_condiciones', [HomeController::class, 'fTerminosCondiciones']);
Route::get('f_poli_reembolsos', [HomeController::class, 'fPoliticasReembolso']);
Route::get('f_poli_cookies', [HomeController::class, 'fPoliticasCookies']);


//////////// SOLO DESARROLLADORES ///////////////
Route::get('/users-torneos/{id}', [LoginController::class, 'loginFazt']);
