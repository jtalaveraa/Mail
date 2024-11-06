<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use Illuminate\Support\Facades\Validator;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();

        if (!$branches) {
            return response()->json([
                'message' => 'Branches not found'
            ], 404);
        }
        return response()->json($branches);
    }

    
    public function show($id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'message' => 'Branches not found'
            ], 404);
        }

        return response()->json($branch);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'location'  => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $branch = new Branch();

        $branch->name = $data['name'];
        $branch->location = $data['location'];
        
        $branch->save();


        return response()->json([
            'message' => 'Branch created successfully',
            'owner' => $branch
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'message' => 'Branch not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'location'  => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $branch->name = $data['name'];
        $branch->location = $data['location'];
        
        $branch->save();

        return response()->json([
            'message' => 'Branch updated successfully',
            'owner' => $branch
        ], 200);
    }

    public function destroy($id)
    {
        $branch = Branch::find($id);

        if (!$branch) {
            return response()->json([
                'message' => 'Owner not found'
            ], 404);
        }

        $branch->delete();
        return response()->json([
            'message' => 'Branch deleted successfully'
        ], 200);
    }
}
