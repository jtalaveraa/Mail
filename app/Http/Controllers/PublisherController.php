<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\Validator;

class PublisherController extends Controller
{
    public function index()
    {
        $publishers = Publisher::all();

        if ($publishers->isEmpty()) {
            return response()->json([
                'message' => 'Publishers not found'
            ], 404);
        }

        return response()->json($publishers);
    }

    public function show($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        return response()->json($publisher);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $publisher = new Publisher();
        $publisher->name = $data['name'];
        $publisher->address = $data['address'] ?? null;
        
        $publisher->save();

        return response()->json([
            'message' => 'Publisher created successfully',
            'publisher' => $publisher
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $publisher->name = $data['name'];
        $publisher->address = $data['address'] ?? null;
        
        $publisher->save();

        return response()->json([
            'message' => 'Publisher updated successfully',
            'publisher' => $publisher
        ], 200);
    }

    public function destroy($id)
    {
        $publisher = Publisher::find($id);

        if (!$publisher) {
            return response()->json([
                'message' => 'Publisher not found'
            ], 404);
        }

        $publisher->delete();

        return response()->json([
            'message' => 'Publisher deleted successfully'
        ], 200);
    }
}
