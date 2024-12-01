<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{

    public function add(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:100|unique:App\Models\User,email',
            'password' => 'required|string|min:5',
            'birthday' => 'required|date',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
    
        // Respuestas
        if ($request->expectsJson()) {
            return response()->json([
                'message' => 'User added successfully!',
                'user' => $user,
            ], 201);
        } else {
            return view('user.home', compact('user'));
        }
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
