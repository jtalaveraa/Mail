<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::all();

        if ($reservations->isEmpty()) {
            return response()->json([
                'message' => 'Reservations not found'
            ], 404);
        }

        return response()->json($reservations);
    }

    public function show($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json([
                'message' => 'Reservation not found'
            ], 404);
        }

        return response()->json($reservation);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'reservation_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $reservation = new Reservation();
        $reservation->book_id = $data['book_id'];
        $reservation->member_id = $data['member_id'];
        $reservation->reservation_date = $data['reservation_date'];

        $reservation->save();

        return response()->json([
            'message' => 'Reservation created successfully',
            'reservation' => $reservation
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json([
                'message' => 'Reservation not found'
            ], 404);
        }

        $validator = Validator::make($data, [
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'reservation_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        $reservation->book_id = $data['book_id'];
        $reservation->member_id = $data['member_id'];
        $reservation->reservation_date = $data['reservation_date'];

        $reservation->save();

        return response()->json([
            'message' => 'Reservation updated successfully',
            'reservation' => $reservation
        ], 200);
    }

    public function destroy($id)
    {
        $reservation = Reservation::find($id);

        if (!$reservation) {
            return response()->json([
                'message' => 'Reservation not found'
            ], 404);
        }

        $reservation->delete();

        return response()->json([
            'message' => 'Reservation deleted successfully'
        ], 200);
    }
}
