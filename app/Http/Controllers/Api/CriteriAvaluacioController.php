<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CriteriResource;
use Illuminate\Http\Request;
use App\Models\CriterisAvaluacio;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;

class CriteriAvaluacioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $criteri = CriterisAvaluacio::all();
            $response = CriteriResource::collection($criteri);
        } catch (\Throwable $th) {
            $response = response()->json(['error' => 'Error showing criteri: ' . $th->getMessage()], 500);
        }
        return $response;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $criteri = new CriterisAvaluacio();
        $criteri->ordre = $request->input('ordre');
        $criteri->descripcio = $request->input('descripcio');
        $criteri->actiu = $request->input('actiu');
        $criteri->resultats_aprenentatge_id = $request->input('resultats_aprenentatge_id');

        try {
            $criteri->save();
            $response = response()->json(['bien insertado'], 200);
        } catch (QueryException $ex) {
            $mensaje = Utilidad::errorMessage($ex);
            $response = response()->json(['error' => $mensaje], 400);
        }

        return $response;
    }

    /**
     * Display the specified resource.
     */
    public function show(CriterisAvaluacio $criterisAvaluacio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CriterisAvaluacio $criterisAvaluacio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CriterisAvaluacio $criterisAvaluacio)
    {
        //
    }
}
