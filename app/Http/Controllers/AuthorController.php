<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                'message' => 'Authors not found'
            ], 404);
        }

        return response()->json($authors);
    }

    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        return response()->json($author);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $author = new Author();

        $author->name = $data['name'];
        $author->birth_date = $data['birth_date'];

        $author->save();

        return response()->json([
            'message' => 'Author created successfully',
            'author' => $author
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'birth_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $author->name = $data['name'];
        $author->birth_date = $data['birth_date'];

        $author->save();

        return response()->json([
            'message' => 'Author updated successfully',
            'author' => $author
        ], 200);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                'message' => 'Author not found'
            ], 404);
        }

        $author->delete();

        return response()->json([
            'message' => 'Author deleted successfully'
        ], 200);
    }
}
