<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $this->validateLogin($request);

        if( Auth::attempt($request->only('email', 'password')) ){
            return response()->json([
                'token' => $request->user()->createToken($request->username)->plainTextToken,
                'message' => 'Success'
            ], 200);
        }

        return response()->json([
            'message' => "Unauthorized"
        ], 401);
    }

    public function validateLogin(Request $request){
        return $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'username' => 'required'
        ]);
    }

    public function profile(Request $request){
        // Buscar el token en la tabla de tokens personales de Sanctum
        $personalAccessToken = PersonalAccessToken::findToken($request->token);

        if ($personalAccessToken) {
            // Obtener el usuario asociado al token
            $user = $personalAccessToken->tokenable;

            if ($user) {
                // El usuario fue encontrado
                return response()->json($user, 200);
            } else {
                // El usuario no fue encontrado
                return response()->json([
                    'message' => 'Usuario no encontrado',
                ], 404);
            }
        } else {
            // El token no fue encontrado
            return response()->json([
                'message' => 'Token no válido',
            ], 401);
        }
    }
}
