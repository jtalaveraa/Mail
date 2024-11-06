<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class JWTController extends Controller
{
    public function login(Request $request){
        $validate = Validator::make($request->all(),
        [
            "email" => "required|email",
            "password" => "required",
        ]
        
        );

        if($validate->fails()){
            return response()->json(
                [
                    "msg"=> "Datos Invalidos",
                    "error" => $validate->errors()
                ]
                ,422);
        }
        $credentials = $request->only('email', 'password');

        $token = Auth::guard('jwt')->attempt($credentials);
        if (!$token) {
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        }

        return response()->json(
            [
                "msg"=> "Credenciales Validas",
                "token" => [
                    'token' => $token,
                    'type' => 'bearer',
                ]
            ]
            ,201);
    }
}
