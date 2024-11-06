<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Illuminate\Support\Facades\Validator;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();

        if ($loans->isEmpty()) {
            return response()->json([
                'message' => 'Loans not found'
            ], 404);
        }

        return response()->json($loans);
    }

    public function show($id)
    {
        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 404);
        }

        return response()->json($loan);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $loan = new Loan();
        $loan->book_id = $data['book_id'];
        $loan->member_id = $data['member_id'];
        $loan->loan_date = $data['loan_date'];
        $loan->return_date = $data['return_date'] ?? null;

        $loan->save();

        return response()->json([
            'message' => 'Loan created successfully',
            'loan' => $loan
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'loan_date' => 'required|date',
            'return_date' => 'nullable|date|after_or_equal:loan_date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $loan->book_id = $data['book_id'];
        $loan->member_id = $data['member_id'];
        $loan->loan_date = $data['loan_date'];
        $loan->return_date = $data['return_date'] ?? null;

        $loan->save();

        return response()->json([
            'message' => 'Loan updated successfully',
            'loan' => $loan
        ], 200);
    }

    public function destroy($id)
    {
        $loan = Loan::find($id);

        if (!$loan) {
            return response()->json([
                'message' => 'Loan not found'
            ], 404);
        }

        $loan->delete();

        return response()->json([
            'message' => 'Loan deleted successfully'
        ], 200);
    }
}
