<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        return response()->json($reservation);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $reservation = new Reservation;
        $reservation->check_in_date = $request->check_in_date;
        $reservation->check_out_date = $request->check_out_date;
        $reservation->created_by_customer = $request->created_by_customer;
        $reservation->transaction_id = $request->transaction_id;
        $reservation->employee_id = $request->employee_id;
        $reservation->user_id = $request->user_id;
        $reservation->room_id = $request->room_id;
        $reservation->save();

        return response()->json([
            "Message" => "Reservacion creada con exito"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $reservation = Reservation::find($id);

        if( !empty($reservation) ){
            return response()->json([
                $user
            ], 200);
        } else {
            return response()->json([
                "Message" => "Reservacion no encontrada"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if( Reservation::where('id', $id)->exists() ){
            $reservation = Reservation::find($id);
            $reservation->check_in_date = is_null($request->check_in_date) ? $reservation->check_in_date : $request->check_in_date;
            $reservation->check_out_date = is_null($request->check_out_date) ? $reservation->check_out_date : $request->check_out_date;
            $reservation->created_by_customer = is_null($request->created_by_customer) ? $reservation->created_by_customer : $request->created_by_customer;
            $reservation->transaction_id = is_null($request->transaction_id) ? $reservation->transaction_id : $request->transaction_id;
            $reservation->employee_id = is_null($request->employee_id) ? $reservation->employee_id : $request->employee_id;
            $reservation->user_id = is_null($request->user_id) ? $reservation->user_id : $request->user_id;
            $reservation->room_id = is_null($request->room_id) ? $reservation->room_id : $request->room_id;
            $reservation->save();
            return response()-json([
                "Message" => "reservacion actualizada"
            ], 200);
        } else {
            return response()->json([
                "Message" => "reservacion no encontrada"
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( Reservation::where('id', $id)->exists() ){
            $reservation = Reservation::find($id);
            $reservation->delete();
            return respose()->json([
                "Message" => "Reservacion eliminada"
            ]);
        } else {
            return response()->json([
                "Message" => "Reservacion no encontrada"
            ]);
        }
    }
}
