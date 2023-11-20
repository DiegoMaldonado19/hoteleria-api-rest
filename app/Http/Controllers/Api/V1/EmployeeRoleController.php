<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\EmployeeRole;
use Illuminate\Http\Request;

class EmployeeRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeRole = EmployeeRole::all();
        return response()->json($employeeRole);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employeeRole = new EmployeeRole;
        $employeeRole->name = $request->name;
        $employeeRole->save();

        return response()->json([
            "Message" => "Rol creado con exito"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employeeRole = EmployeeRole::find($id);

        if( !empty($employeeRole) ){
            return response()->json([
                $employeeRole
            ], 200);
        } else {
            return response()->json([
                "Message" => "Rol no encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if( EmployeeRole::where('id', $id)->exists() ){
            $employeeRole = EmployeeRole::find($id);
            $employeeRole->name = is_null($request->name) ? $employeeRole->name : $request->name;
            $employeeRole->save();

            return response()->json([
                "Message" => "Rol actualizado"
            ], 200);
        } else {
            return response()->json([
                "Message" => "Rol no encontrado"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( EmployeeRole::where('id', $id)->exist() ){
            $employeeRole = EmployeeRole::find($id);
            $employeeRole->delete();

            return response()->json([
                "Message" => "Rol eliminado"
            ], 202);
        } else {
            return response()->json([
                "Message" => "Rol no encontrado"
            ], 404);
        }
    }
}
