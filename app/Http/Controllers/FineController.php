<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fine;
use Illuminate\Support\Facades\Validator;

class FineController extends Controller
{
    public function index()
    {
        $fines = Fine::all();

        if ($fines->isEmpty()) {
            return response()->json([
                'message' => 'Fines not found'
            ], 404);
        }

        return response()->json($fines);
    }

    public function show($id)
    {
        $fine = Fine::find($id);

        if (!$fine) {
            return response()->json([
                'message' => 'Fine not found'
            ], 404);
        }

        return response()->json($fine);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'paid' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $fine = new Fine();
        $fine->member_id = $data['member_id'];
        $fine->amount = $data['amount'];
        $fine->paid = $data['paid'] ?? false;

        $fine->save();

        return response()->json([
            'message' => 'Fine created successfully',
            'fine' => $fine
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $fine = Fine::find($id);

        if (!$fine) {
            return response()->json([
                'message' => 'Fine not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'member_id' => 'required|exists:members,id',
            'amount' => 'required|numeric|min:0',
            'paid' => 'boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $fine->member_id = $data['member_id'];
        $fine->amount = $data['amount'];
        $fine->paid = $data['paid'] ?? false;

        $fine->save();

        return response()->json([
            'message' => 'Fine updated successfully',
            'fine' => $fine
        ], 200);
    }

    public function destroy($id)
    {
        $fine = Fine::find($id);

        if (!$fine) {
            return response()->json([
                'message' => 'Fine not found'
            ], 404);
        }

        $fine->delete();

        return response()->json([
            'message' => 'Fine deleted successfully'
        ], 200);
    }
}
