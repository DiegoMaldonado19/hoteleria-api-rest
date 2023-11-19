<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userRole = UserRole::all();
        return response()->json($userRole);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!empty($request->name)){
            $userRole = new UserRole;
            $userRole->name = $request->name;
            return response()->json([
                "Message" => "Role creado"
            ], 201);
        } else {
            return response()->json([
                "Message" => "El rol debe tener un nombre"
            ], 406);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $userRole = UserRole::find($id);

        if(!empty($userRole)){
            return response()->json([
                $userRole
            ], 200);
        } else {
            return response()->json([
                "message" => "rol no encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(UserRole::where('id', $id)->exists()){
            $userRole = UserRole::find($id);
            $userRole->name = is_null($request->name) ? $userRole->name : $request->name;
            return response()->json([
                "message" => "Rol actualizado"
            ], 200);
        } else {
            return response()->json([
                "message" => "Rol no encontrado"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( UserRole::where('id', $id)->exists() ){
            $userRole = UserRole::where($id);
            $userRole->delete();

            return response()->json([
                "Message" => "Rol eliminado con exito"
            ], 202);
        } else {
            return response()->json([
                "message" => "Rol no encontrado"
            ], 404);
        }
    }
}
