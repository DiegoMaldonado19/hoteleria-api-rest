<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaction = Transaction::all();
        return response()->json($transaction);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $transaction = new Transaction;
        $transaction->employee_id = $request->employee_id;
        $transaction->transaction_type = $request->transaction_type;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->amount = $request->amount;
        $user->save();
        return response()->json([
            'Message' => 'Transaction creado con exito'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $transaction = Transaction::find($id);

        if(!empty($transaction)){
            return response()->json([
                $transaction
            ], 200);
        } else {
            return response()->json([
                "message" => "Transaction no encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(Transaction::where('id', $id)->exists()){
            $transaction = Transaction::find($id);
            $transaction->employee_id = is_null($request->employee_id) ? $transaction->employee_id : $request->employee_id;
            $transaction->transaction_type = is_null($request->transaction_type) ? $transaction->transaction_type : $request->transaction_type;
            $transaction->transaction_date = is_null($request->transaction_date) ? $transaction->transaction_date : $request->transaction_date;
            $transaction->amount = is_null($request->amount) ? $transaction->amount : $request->amount;
            $transaction->save();
            return response()->json([
                "message" => "Transaccion actualizada"
            ], 200);
        } else {
            return response()->json([
                "message" => "Transaccion no encontrada"
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(Transaction::where('id', $id)->exists()){
            $transaction = Transaction::find($id);
            $transaction->delete();

            return response()->json([
                "message" => "Transaccion eliminada"
            ], 202);
        } else {
            return response()->json([
                "message" => "Transaccion no encontrada"
            ], 404);
        }
    }
}
