<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class SanctumController extends Controller
{
    PUBLIC FUNCTION login(Request $request){
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
        $user = User::Where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    "msg"=> "Credenciales Invalidas",
                ]
                ,401);
        }

        return response()->json(
            [
                "msg"=> "Credenciales Invalidas",
                "token" => $user->createToken('generic')->plainTextToken 
            ]
            ,201);
    }
}
