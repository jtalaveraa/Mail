<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Librarian;
use Illuminate\Support\Facades\Validator;

class LibrarianController extends Controller
{
    public function index()
    {
        $librarians = Librarian::all();

        if ($librarians->isEmpty()) {
            return response()->json([
                'message' => 'Librarians not found'
            ], 404);
        }

        return response()->json($librarians);
    }

    public function show($id)
    {
        $librarian = Librarian::find($id);

        if (!$librarian) {
            return response()->json([
                'message' => 'Librarian not found'
            ], 404);
        }

        return response()->json($librarian);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $librarian = new Librarian();
        $librarian->name = $data['name'];
        $librarian->branch_id = $data['branch_id'];

        $librarian->save();

        return response()->json([
            'message' => 'Librarian created successfully',
            'librarian' => $librarian
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $librarian = Librarian::find($id);

        if (!$librarian) {
            return response()->json([
                'message' => 'Librarian not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $librarian->name = $data['name'];
        $librarian->branch_id = $data['branch_id'];

        $librarian->save();

        return response()->json([
            'message' => 'Librarian updated successfully',
            'librarian' => $librarian
        ], 200);
    }

    public function destroy($id)
    {
        $librarian = Librarian::find($id);

        if (!$librarian) {
            return response()->json([
                'message' => 'Librarian not found'
            ], 404);
        }

        $librarian->delete();

        return response()->json([
            'message' => 'Librarian deleted successfully'
        ], 200);
    }
}
