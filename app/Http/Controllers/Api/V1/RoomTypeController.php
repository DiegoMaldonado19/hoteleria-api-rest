<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $room_types = RoomType::all();
        return response()->json($room_types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room_type = new RoomType;
        $room_type->name = $request->name;
        $room_type->price = $request->price;

        $room_type->save();

        return response()->json([
            "Message" => "Habitacion creada con exito"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room_type = RoomType::find($id);

        if( !empty($room_type) ){
            return response()->json([
                $room_type
            ], 200);
        } else {
            return response()->json([
                "message" => "habitacion no encontrada"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if( RoomType::where('id', $id)->exists() ){
            $room_type = RoomType::find($id);
            $room_type->name = is_null($request->name) ? $room_type->name : $request->name;
            $room_type->price = is_null($request->price) ? $room_type->price : $request->price;
            $room_type->save();

            return response()->json([
                "Message" => "Habitacion actualizada"
            ], 200);
        } else {
            return response()->json([
                "Message" => "Habitacion no encontrada"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( RoomType::where('id', $id)->exists() ){
            $room_type = RoomType::find($id);
            $room_type->delete();

            return response()->json([
                "Message" => "Habitacion eliminada"
            ], 202);
        } else {
            return response()->json([
                "Message" => "Habitacion no encontrada"
            ], 404);
        }
    }
}
