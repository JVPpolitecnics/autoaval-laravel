<?php

namespace App\Http\Controllers\Api;

use App\Models\Modul;
use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UsuariResource;

class ModulControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $usuari = Usuari::where('tipus_usuaris_id', 3)
                        ->with(['has_modules' => function ($query) {
                            $query->wherePivot('actiu', 1);
                        }])
                        ->get(); 
            $response = UsuariResource::collection($usuari);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'Error showing criteria and students: ' . $th->getMessage()], 500);
        }
        return $response;
    }
    
    public function updateAlumneModules(Request $request, $id)
{
    try {
        // Find the user
        $user = Usuari::findOrFail($id);
        
        // Validate request data
        $request->validate([
            'modules' => 'required|array',
            'modules.*' => 'exists:modules,id',
        ]);

        // Sync user's modules
        $user->has_modules()->sync($request->modul);

        // Return success response
        return response()->json(['message' => 'Modules updated successfully'], 200);
    } catch (\Throwable $th) {
        // Return error response
        return response()->json(['error' => 'Error updating modules: ' . $th->getMessage()], 500);
    }
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
