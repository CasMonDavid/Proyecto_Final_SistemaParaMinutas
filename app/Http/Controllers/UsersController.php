<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    // Guarda un usuario
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:App\Models\User,email',
            'password' => 'required|string|min:5|max:255',
            'birthday' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'La validacion fallo.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        // Respuestas
        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Usuario añadido con exito.',
                'user' => $user,
            ], 201);
        } else {
            return redirect()->route('user.index');
        }
    }

    // Elimina un usuario en base a su id
    public function destroy(User $user_id)
    {
        $user_id->delete();
        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado con exito',
        ], 200);
    }

    // Actualiza un usuario en base a su id
    public function update(Request $request, User $user_id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:App\Models\User,email,{$user_id->id}",
            'password' => 'required|string|min:5|max:255',
            'birthday' => 'required|date',
        ]);

        $request['password'] = bcrypt($request['password']);

        $user_id->update($request->all());

        return redirect()->route('user.show', $user_id->id);
    }

    // Muestra un usuario en base a su id
    public function show(int $user_id)
    {
        $user = User::find($user_id);
        return response()->json($user, 200);
    }

    // Muestra a todos los usuarios
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
}
