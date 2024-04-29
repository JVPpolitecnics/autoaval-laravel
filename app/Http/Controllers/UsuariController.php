<?php

namespace App\Http\Controllers;

use App\Models\Usuari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariController extends Controller
{

        //Authenthicate
        public function authenticate(Request $request){
            $username = $request->input("nom_usuari");
            $contrasenya = $request->input("contrasenya");
            $user = Usuari::where('nom_usuari', $username)->first();
            if ($user != null && Hash::check($contrasenya, $user->contrasenya)) {
            Auth::login($user);
            
                $response = redirect('/rider/home');
           
                return $response;
           
        }else{
        $request->session()->flash('error',
        'Usuari o contrasenya incorrectes');
        return redirect('/usuario/create')->withInput();
    
    
    }
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuaris = Usuari::with('tipus')->paginate(10);
        return view('usuari', compact('usuaris'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('createAlumne');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $usuari = new Usuari();
        $usuari->nom_usuari=$request->nom_usuari;
        $pwd =bcrypt($request->contrasenya);
        $usuari->contrasenya=$pwd;
        $usuari->correu=$request->correu;
        $usuari->nom=$request->nom;
        $usuari->cognom=$request->cognom;
        $usuari->actiu=1;
        $usuari->tipus_usuaris_id=$request->tipus_usuaris_id;


        $usuari->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuari $usuari)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuari $usuari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuari $usuari)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuari $usuari)
    {
        //
    }
}
