<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TorneosController;
use App\Http\Controllers\user\UserDashController;
use App\Http\Controllers\moder\ModerDashController;
use App\Http\Controllers\admin\AdminDashController;
use App\Http\Controllers\admin\AeventoController;
use App\Http\Controllers\ProfilePhotoController;
use Illuminate\Support\Facades\Auth;


#Route::get('/', function () {
    #return view('welcome');
#});

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
    Route::get('profile/show',[UserDashController::class,'show'])->name('profile.show');
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
    Route::prefix('crud')->group(function () {
        Route::get('evento', [AeventoController::class, 'show'])->name('admin.crud.evento');
        Route::get('evento/create', [AeventoController::class, 'create'])->name('evento.create');
        Route::get('evento-edit/{id}/edit', [AeventoController::class, 'editEventos'])->name('evento-edit');
        Route::get('evento/{id}', [AeventoController::class, 'deleteEventos'])->name('evento.delete');
        Route::get('evento/search', [AeventoController::class, 'search'])->name('evento.search');
        Route::post('evento/store', [AeventoController::class, 'store'])->name('evento.store');
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

