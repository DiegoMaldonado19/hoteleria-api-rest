<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $task = Task::all();
        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task;
        $task->employee_id = $request->employee_id;
        $task->task_description = $request->task_description;
        $task->task_date = $request->task_date;
        $task->task_completed = $request->task_completed;
        $task->save();

        return response()->json([
            "Message" => "Usuario creado con exito"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $task = Task::find(id);

        if( !empty($task) ){
            return response()->json([
                $task
            ], 200);
        } else {
            return response()->json([
                "Message" => "Tarea no encontrada"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if( Task::where('id', $id)->exists() ){
            $task = Task::find($id);
            $task->employee_id = is_null($request->employee_id) ? $task->employee_id : $request->employee_id;
            $task->task_description = is_null($request->task_description) ? $task->task_description : $request->task_description;
            $task->task_date = is_null($request->task_date) ? $task->task_date : $request->task_date;
            $task->task_completed = is_null($request->task_completed) ? $task->task_completed : $request->task_completed;
            $task->save();

            return response()->json([
                "Message" => "Tarea actualizada con exito"
            ], 200);
        } else {
            return response()->json([
                "Message" => "Tarea no encontrada"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        if( Task::where('id', $id)->exists() ){
            $task = Task::find($id);
            $task->delete();

            return response()->json([
                "Message" => "Tarea eliminada"
            ], 202);
        } else {
            return response()->json([
                "Message" => "Tarea no encontrada"
            ], 404);
        }
    }
}
