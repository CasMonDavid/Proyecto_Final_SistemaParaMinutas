<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User_project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Users_ProjectsController extends Controller
{
    public function show(int $user_project_id)
    {
        $user_project = User_project::find($user_project_id);
        return response()->json($user_project, 200);
    }

    public function getByProject(Request $request, Project $project)
    {
        $user_project = User_project::where('project_id', '=', $project->id)
            ->get();
        return response()->json($user_project, 200);
    }

    public function index()
    {
        $user_project = User_project::all();
        return response()->json($user_project, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'role' => 'required|string',
        ]);

        try {
            // agregar el usuario al proyecto
            User_project::create([
                'project_id' => $request->project_id,
                'user_id' => $request->user_id,
                'role' => $request->role,
            ]);

            return response()->json(/*['message' => 'Usuario agregado con éxito'],*/ 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error al agregar usuario', 'error' => $e->getMessage()], 500);
        }
    }
}
