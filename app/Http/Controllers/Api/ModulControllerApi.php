<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ModulResource;
use App\Models\Modul;
use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuariResource;
use Illuminate\Support\Facades\Response;

class ModulControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usuari = Usuari::where('tipus_usuaris_id', 3)
                ->with([
                    'has_modules' => function ($query) {
                        $query->wherePivot('actiu', 1);
                    }
                ])
                ->get();
            $response = UsuariResource::collection($usuari);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'Error showing criteria and students: ' . $th->getMessage()], 500);
        }
        return $response;
    }
    public function updateAlumneModules(Request $request, $idUsuari, $modulId)
    {
        try {
            $usuari = Usuari::findOrFail($idUsuari);


            $actiu = $request->input('actiu');
            $existingModule = $usuari->has_modules()->where('moduls_id', $modulId)->first();
            if ($existingModule) {
                $usuari->has_modules()->sync([$modulId => ['actiu' => $actiu]], false);
            } else {
                $usuari->has_modules()->attach($modulId, ['actiu' => $actiu]);
            }
            $response = response()->json(['message' => 'Success updating criteria']);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'Error updating evaluation criteria' . $th->getMessage()], 500);
        }
        return $response;
    }

    public function getAllModuls(Request $request)
    {
        try {
            $modul = Modul::all();
            $response = ModulResource::collection($modul);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'Error al mostrar los usuarios: ' . $th->getMessage()], 500);
        }
        return $response;

    }

    public function addModulToUser($idUsuari, $idModul){
        try {
            $usuari = Usuari::findOrFail($idUsuari);
    
            
            $actiu = 1;
    
            $usuari->has_modules()->sync([$idModul => ['actiu' => $actiu]], false);
    
            $response = response()->json(['Success updating user moduls']);
        } catch (\Throwable $th) {
            $response = response()->json(['Error updating evaluation user moduls']);
        }
        return $response;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
     
    }

    /**
     * Display the specified resource.
     */
    public function show(Modul $modul)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modul $modul)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modul $modul)
    {
        //
    }

}
