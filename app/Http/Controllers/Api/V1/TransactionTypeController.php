<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\TransactionType;
use Illuminate\Http\Request;

class TransactionTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction_types = TransactionType::all();
        return response()->json($transaction_types);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction_type = new TransactionType;
        $transaction_type->name = $request->name;

        $transaction_type->save();

        return response()->json([
            "Message" => "Tipo de Transaccion creada con exito"
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction_type = TransactionType::find($id);

        if( !empty($transaction_type) ){
            return response()->json([
                $transaction_type
            ], 200);
        } else {
            return response()->json([
                "message" => "Tipo de Transaccion no encontrada"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if( TransactionType::where('id', $id)->exists() ){
            $rtransaction_type = TransactionType::find($id);
            $transaction_type->name = is_null($request->name) ? $transaction_type->name : $request->name;
            $transaction_type->save();

            return response()->json([
                "Message" => "Tipo de Transaccion actualizada"
            ], 200);
        } else {
            return response()->json([
                "Message" => "Tipo de Transaccion no encontrada"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if( TransactionType::where('id', $id)->exists() ){
            $transaction_type = TransactionType::find($id);
            $transaction_type->delete();

            return response()->json([
                "Message" => "Tipo de Transaccion eliminada"
            ], 202);
        } else {
            return response()->json([
                "Message" => "Tipo de Transaccion no encontrada"
            ], 404);
        }
    }
}
