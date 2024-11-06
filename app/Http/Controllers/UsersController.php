<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index() {
        $users = User::all();

        return response()->json([
            "users" => $users
        ], 200);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $data = $request->all();
        $user->fill($data);
        $user->save();

        return response()->json([
            'message' => 'Usuario actualizado',
        ]);
    }

    public function show($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json(
            $user
        );
    }

    public function destroy($id) {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Usuario eliminado'
        ]);
    }

    public function updateRol(Request $request) {   
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'rol' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()
            ], 400);
        }

        if ($request->rol !== 'admin' && $request->rol !== 'user' && $request->rol !== 'guest') {
            return response()->json([
                'message' => 'Rol inválido'
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'error' => 'Usuario no encontrado'
            ], 404);
        }

        $data = $request->all();

        if ($user->rol === 'admin') {
            return response()->json([
                'message' => 'El usuario es admin'
            ], 400);
        }

        $user->rol = $data['rol'];
        $user->save();

        return response()->json([
            'message' => 'Usuario actualizado, su nuevo rol es: ' . $user->rol 
        ]);
    }
}
