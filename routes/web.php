<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TorneosController;
use App\Http\Controllers\user\UserDashController;
use App\Http\Controllers\user\Torneos_UserController;
use App\Http\Controllers\user\Recompensas_UserController;
use App\Http\Controllers\user\EventosController;

use App\Http\Controllers\moder\ModerDashController;

use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\admin\AeventoController;
use App\Http\Controllers\admin\AtorneoController;
use App\Http\Controllers\ProfilePhotoController;
use App\Http\Controllers\admin\RecompensasController;
use App\Http\Controllers\admin\UsuariosController;
use Illuminate\Support\Facades\Auth;


#Route::get('/', function () {
    #return view('welcome');
#});

Route::get('usuarios', function () {
    return view('usuarios');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

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
    Route::get('dashboard',[UserDashController::class,'index'])->name('dashboard');
    Route::get('profile/show',[UserDashController::class,'show'])->name('profiles.show');
    Route::get('users-torneos', [Torneos_UserController::class, 'index'])->name('users-torneos');
    Route::get('users-recompensas', [Recompensas_UserController::class, 'index'])->name('users-recompensas');

    Route::get('users-eventos', [EventosController::class, 'index'])->name('users-eventos');
    Route::get('torneos-users', [TorneosController::class, 'torneos_usuarios'])->name('torneos.usuarios');
    
});

///////////////////////////////////////////////////////////////////////////
/////////////////////////////// moder /////////////////////////////////////
Route::middleware(['auth.moder'])->group(function () {
    Route::get('moder/dashboard',[ModerDashController::class,'index'])->name('moder.dashboard');
    
});

///////////////////////////////////////////////////////////////////////////
/////////////////////////////// admin /////////////////////////////////////

Route::middleware(['auth.admin'])->group(function () {
    Route::get('admin/dashboard',[AdminDashController::class,'index'])->name('admin.dashboard');
    
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
        
        Route::get('usuarios', [UsuariosController::class, 'showListado'])->name('usuarios');
    });
});




///////////////////////////////////////////////////////////////////////////
/////////////////////////////// HOME /////////////////////////////////////

Route::get('/', [HomeController::class, 'index']);

Route::get('torneos', [TorneosController::class, 'index']);


Route::get('f_nosotros', [HomeController::class, 'fNosotros']);
Route::get('f_metodos_pago', [HomeController::class, 'fMetodosPago']);
Route::get('f_torneos', [HomeController::class, 'fTorneos']);
Route::get('f_eventos', [HomeController::class, 'fEventos']);

Route::get('f_poli_privacidad', [HomeController::class, 'fPoliticasPrivacidad']);
Route::get('f_termin_condiciones', [HomeController::class, 'fTerminosCondiciones']);
Route::get('f_poli_reembolsos', [HomeController::class, 'fPoliticasReembolso']);
Route::get('f_poli_cookies', [HomeController::class, 'fPoliticasCookies']);

