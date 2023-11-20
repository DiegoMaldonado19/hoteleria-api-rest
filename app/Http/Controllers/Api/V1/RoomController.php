<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();
        return response()->json($rooms);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $room = new Room;
        $room->rate = $request->rate;
        $room->available = $request->available;
        $room->room_type = $request->room_type;

        $room->save();

        return response()->json([
            "Message" => "Habitacion creada con exito"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = Room::find($id);

        if( !empty($room) ){
            return response()->json([
                $room
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
        if( Room::where('id', $id)->exists() ){
            $room = Room::find($id);
            $room->rate = is_null($request->rate) ? $room->rate : $request->rate;
            $room->available = is_null($request->available) ? $room->available : $request->available;
            $room->room_type = is_null($request->room_type) ? $room->room_type : $request->room_type;
            $room->save();

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
        if( Room::where('id', $id)->exists() ){
            $room = Room::find($id);
            $room->delete();

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
