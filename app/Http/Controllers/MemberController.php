<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();

        if ($members->isEmpty()) {
            return response()->json([
                'message' => 'Members not found'
            ], 404);
        }

        return response()->json($members);
    }

    public function show($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'message' => 'Member not found'
            ], 404);
        }

        return response()->json($member);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email',
            'joining_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $member = new Member();
        $member->name = $data['name'];
        $member->email = $data['email'];
        $member->join_date = $data['join_date'];

        $member->save();

        return response()->json([
            'message' => 'Member created successfully',
            'member' => $member
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'message' => 'Member not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:members,email,' . $id,
            'joining_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $member->name = $data['name'];
        $member->email = $data['email'];
        $member->join_date = $data['join_date'];

        $member->save();

        return response()->json([
            'message' => 'Member updated successfully',
            'member' => $member
        ], 200);
    }

    public function destroy($id)
    {
        $member = Member::find($id);

        if (!$member) {
            return response()->json([
                'message' => 'Member not found'
            ], 404);
        }

        $member->delete();

        return response()->json([
            'message' => 'Member deleted successfully'
        ], 200);
    }
}
