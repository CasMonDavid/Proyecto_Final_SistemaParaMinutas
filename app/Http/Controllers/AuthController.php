<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function login (Request $request){
        $validar = $request->validate([
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:5',
        ]);

        if (Auth::attempt($validar)) {
            $request->session()->regenerate();

            return response()->json([
                'status' => true,
                'message' => 'Sesión iniciada con exito.',
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Datos incorrectos.'
            ], 401);
        }

    }

    public function getUser (){
        $user = Auth::user();

        if ($user){
            return response()->json([
                'status' => true,
                'message' => 'Usuario obtenido exitosamente',
                'user' => $user,
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No hay una sesión activa',
            ], 401);
        }
    }

    public function logout (Request $request){
        
        if (Auth::check()){
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json([
                'status' => true,
                'message' => 'Sesión cerrada exitosamente',
            ]);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'No había sesión que cerrar',
            ]);
        }
        


    }
}
