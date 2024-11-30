<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function add(Request $request){

        $validate = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'password' => 'required|string|min:5',
            'birthday' => 'required|date',
        ]);

        // Encriptar la contraseña antes de guardar
        $validate['password'] = bcrypt($validate['password']);

        // Crear el usuario
        $user = User::create($validate);

        // Respuesta de éxito
        return response()->json([
            'message' => 'User added successfully!',
            'user' => $user,
        ], 201);
    }

    public function details(Request $request){
        return "Hola soy details";
    }

    public function delete(Request $request){
        return "Hola soy deleteUser";
    }

    public function get(Request $request){
        return "Hola soy get";
    }

    public function getAll(Request $request){
        $users = User::all();

        return $users;
    }
}
