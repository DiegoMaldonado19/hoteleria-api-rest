<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!empty($user)){
            return response()->json([
                $user
            ], 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $user->username = is_null($request->username) ? $user->name : $request->name;
            $user->email = is_null($request->email) ? $user->email : $request->email;
            $user->password =  is_null($request->password) ? $user->password : Hash::make($request->password);
            $user->save();
            return response()->json([
                "message" => "User updated"
            ], 200);
        } else {
            return response()->json([
                "message" => "User not found"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(User::where('id', $id)->exists()){
            $user = User::find($id);
            $use->delete();

            return response()->json([
                "message" => "user deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "user not found"
            ], 404);
        }
    }
}
