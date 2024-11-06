<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use  App\Models\User;
Use Illuminate\Support\Facades\Mail;
Use Illuminate\Support\Facades\Validator;
Use Illuminate\Support\Facades\URL;
use App\Mail\Noti;
Use App\Mail\ActivarCuenta;


class CuentasController extends Controller
{
    public function activate($userId)
    {
        $user = User::find($userId);

        if (!$user) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        if ($user->is_active) {
            return response()->json(['message' => 'La cuenta ya está activada'], 200);
        }

        $user->is_active = true;
        
        $user->save();

        $admin = User::where('rol', 'admin')->first();

        if (!$admin) {
            return response()->json(['message' => 'Administrador no encontrado'], 404);
        }

        Mail::to($admin->email)->send(new Noti($user));
        
        return response()->json([
            'message' => 'Cuenta activada exitosamente',
        ], 200);
    }

    public function reActivate(Request $request) {
        $data = $request->all();

        $validate = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors());
        }

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'El correo no se encuentra registrado'], 404);
        }

        if ($user->is_active) {
            return response()->json(['message' => 'La cuenta ya está activada'], 200);
        }

        $url = URL::temporarySignedRoute('activate', now()->addMinutes(5), ['user' => $user->id]);

        $activarCuenta = new ActivarCuenta($user, $url);

        Mail::to($user->email)->send($activarCuenta);

        return response()->json([
            'message' => 'Revisa tu correo electrónico para activar tu cuenta',
        ]);
    }

}
