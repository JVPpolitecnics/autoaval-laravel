<?php

use App\Http\Controllers\Api\CriteriAvaluacioController;
use App\Http\Controllers\Api\LoggedInUserController;
use App\Http\Controllers\Api\ModulControllerApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
});

Route::middleware(['web', 'auth'])->group(function () {

    Route::get('user/LogedIn', [LoggedInUserController::class, 'getLoggedUser']);
    
    });
    Route::get('criteri/alumnesAndCriteris', [CriteriAvaluacioController::class, 'showAlumnesWithCriteris']);
    Route::get('criteri/loggedAlumneAndCriter/alumneId/{idAlumne}', [CriteriAvaluacioController::class, 'showLoggedUserWithCriteris']);

    Route::put('modul/updateAlumneModuls/alumneId/{id}/modul{modulId}', [ModulControllerApi::class, 'updateAlumneModules']);
    
    Route::put('criteri/updateAlumnesCriteris/user/{idUsuari}/criteri/{criteriId}', [CriteriAvaluacioController::class, 'updateAlumneCriteri']);
    Route::apiResource('criteri', CriteriAvaluacioController::class);
    Route::apiResource('modul', ModulControllerApi::class);
    