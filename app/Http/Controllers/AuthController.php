<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Mail\ActivarCuenta;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // REGISTER
    public function register(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        $user->rol = "guest";
        $user->save();

        $url = URL::temporarySignedRoute('activate', now()->addMinutes(5), ['user' => $user->id]);

        $activarCuenta = new ActivarCuenta($user, $url);
        Mail::to($user->email)->send($activarCuenta);

        return response()->json([
            'message' => 'Revisa tu correo electrónico para activar tu cuenta',
        ]);
    }


    // LOGIN
    public function login(Request $request)
    {
        $data = $request->all();

        $validate = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        
        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        $user = User::where('email', $data['email'])->first();

        if ($user->rol === 'guest') {
            return response()->json([
                'message' => 'Acceso denegado. Por favor, contacte con un administrador para obtener acceso.'
            ], 403);
        }

        if (!$user->is_active) {
            return response()->json([
                'message' => 'La cuenta no ha sido activada',
            ]);
        }

        $token = $user->createToken('Access Token')->plainTextToken;

        return response()->json([
            'message' => 'Login exitoso',
            'token' => $token
        ]);
    }
}
