<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if ($books->isEmpty()) {
            return response()->json([
                'message' => 'Books not found'
            ], 404);
        }

        return response()->json($books);
    }

    public function show($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        return response()->json($book);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'publication_year' => 'required|integer|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $book = new Book();
        $book->title = $data['title'];
        $book->author_id = $data['author_id'];
        $book->category_id = $data['category_id'];
        $book->publisher_id = $data['publisher_id'];
        $book->publication_year = $data['publication_year'];
        
        $book->save();

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'title' => 'required|string|max:255',
            'author_id' => 'required|exists:authors,id',
            'category_id' => 'required|exists:categories,id',
            'publisher_id' => 'required|exists:publishers,id',
            'publication_year' => 'required|integer|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $book->title = $data['title'];
        $book->author_id = $data['author_id'];
        $book->category_id = $data['category_id'];
        $book->publisher_id = $data['publisher_id'];
        $book->publication_year = $data['publication_year'];
        
        $book->save();

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ], 200);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json([
                'message' => 'Book not found'
            ], 404);
        }

        $book->delete();

        return response()->json([
            'message' => 'Book deleted successfully'
        ], 200);
    }
}
