<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $user = new User;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        if(!empty($request->employee_id)){
            $user->employee_id = $request->employee_id;
        }
        else {
            $user->employee_id = null;
        }
        $user->user_role = $request->user_role;
        $user->save();
        return response()->json([
            'Message' => 'Usuario creado con exito'
        ], 201);
    }
}
