<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;

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
                'message' => 'La validación falló.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);

        // Iniciar sesión automáticamente
        Auth::login($user);

        // Respuesta JSON o redirección
        if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Usuario registrado y autenticado con éxito.',
                'user' => $user,
            ], 201);
        }

        return redirect()->route('user.index');
    }

    // Elimina un usuario en base a su id
    public function destroy(User $user_id)
    {
        try{
            $user_id->delete();
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => $e->getMessage(),
            ], 422);
        }
        return response()->json([
            'status' => true,
            'message' => 'Usuario eliminado con éxito',
        ], 200);
    }

    // Actualiza un usuario en base a su id
    public function update(Request $request, User $user_id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|max:255|unique:App\Models\User,email,{$user_id->id}",
            'password' => 'required|string|min:5|max:255',
            'birthday' => 'required|date',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $user_id->update($validatedData);

        return response()->json([
            'status' => true,
            'message' => 'Usuario actualizado con éxito.',
            'user' => $user_id,
        ], 200);
    }

    // Muestra un usuario en base a su id
    public function show(int $user_id)
    {
        $user = User::find($user_id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Usuario no encontrado.',
            ], 404);
        }

        return response()->json($user, 200);
    }

    // Muestra a todos los usuarios
    public function index()
    {
        $users = User::all();
        return response()->json($users, 200);
    }
}
