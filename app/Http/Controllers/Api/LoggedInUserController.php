<?php

namespace App\Http\Controllers\Api;

use App\Models\Usuari;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoggedInUserController extends Controller
{
    public function getLoggedUser(Request $request)
    {
        if (Auth::check()) {
            $user= Auth::user();
            return response()->json($user, 200);
        } else {
            return response()->json(['error' => 'User not logged in'], 401);
        }
    }
}
