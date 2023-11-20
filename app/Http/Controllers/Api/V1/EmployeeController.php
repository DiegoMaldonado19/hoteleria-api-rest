<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all();
        return response()->json($employees);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $employee = new Employee;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_role_id = $request->employee_role_id;
        $employee->shift_start_time = $request->shift_start_time;
        $employee->shift_end_time = $request->shift_end_time;
        $employee->save();

        return response()->json([
            "Message" => "Empleado creado con exito"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        if( !empty($employee) ){
            return response()->json([
                $employee
            ], 200);
        } else {
            return response()->json([
                "Message" => "Empleado no encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $id)
    {
        if( Employee::where('id', $id)->exists() ){

            $employee = Employee::find($id);
            $employee->first_name = is_null($request->first_name) ? $employee->first_name : $request->first_name;
            $employee->last_name = is_null($request->last_name) ? $employee->last_name : $request->last_name;
            $employee->employee_role_id = is_null($request->employee_role_id) ? $employee->employee_role_id : $request->employee_role_id;
            $employee->shift_start_time = is_null($request->shift_start_time) ? $employee->shift_start_time : $request->shift_start_time;
            $employee->shift_end_time = is_null($request->shift_end_time) ? $employee->shift_end_time : $request->shift_end_time;
            $employee->save();

            return response()->json([
                "message" => "Empleado actualizado"
            ], 200);
        } else {
            return response()->json([
                "message" => "Empleado no encontrado"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( Employe::where('id', $id)->exists() ) {
            $employee = Employee::find($id);
            $employee->delete();

            return response()->json([
                "message" => "Usuario eliminado"
            ], 200);
        } else {
            return response()->json([
                "message" => "Usuario no encontrado"
            ], 404);
        }
    }
}
