<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [HomeController::class, 'index']);

Route::get('f_nosotros', [HomeController::class, 'fNosotros']);
Route::get('f_tienda', [HomeController::class, 'fTienda']);
Route::get('f_metodos_pago', [HomeController::class, 'fMetodosPago']);
Route::get('f_torneos', [HomeController::class, 'fTorneos']);
Route::get('f_eventos', [HomeController::class, 'fEventos']);
Route::get('f_categorias', [HomeController::class, 'fCategorias']);

Route::get('f_poli_privacidad', [HomeController::class, 'fPoliticasPrivacidad']);
Route::get('f_termin_condiciones', [HomeController::class, 'fTerminosCondiciones']);
Route::get('f_poli_reembolsos', [HomeController::class, 'fPoliticasReembolso']);
Route::get('f_poli_cookies', [HomeController::class, 'fPoliticasCookies']);
