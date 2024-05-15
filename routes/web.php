<?php

use App\Models\TipusUsuari;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CicleController;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\UsuariController;
use App\Http\Controllers\TipusUsuariControlller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/index', function () {
    return view('auth.login');
})->name('index');


Route::middleware(['CheckProfe'])->group(function () {
    Route::get('/modulVue', function () {
        return view('modulVue');
    });
});
Route::middleware(['CheckAdmin'])->group(function () {
    Route::get('/modulVue', function () {
        return view('modulVue');
    });
});

Route::middleware(['CheckAlumne'])->group(function () {
    Route::get('/alumnesCriteris', function () {
        return view('alumnesCriteris');
    });
});


Route::post('auth', [App\Http\Controllers\UsuariController::class, 'authenticate']);

Route::resource('cicles', CicleController::class);
Route::resource('tipusUsuari', TipusUsuariControlller::class);
Route::resource('usuari', UsuariController::class);
Route::resource('modul', ModulController::class);