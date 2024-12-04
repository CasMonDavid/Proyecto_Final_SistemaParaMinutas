<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    public function store(Request $request){
        $enum = ['En curso', 'En riesgo', 'Terminado'];

        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:10000'],
            'status' => ['required',Rule::in($enum)],
            'created_by' => ['required','exists:users,id'],
            'collaborators' => ['required','array'],
            'collaborators.*' => ['exists:users,id']
        ]);

        //$validated (old)= $validator->validated();
        
        DB::transaction(function () use ($validated){
            $project = Project::create([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'status' => $validated['status'],
                'created_by' => $validated['created_by'],
            ]);

            foreach ($validated['collaborators'] as $userId) {
                $project->collaborators()->attach($userId, [
                    'role' => 'Colaborador',
                ]);
            };

        });

        return redirect()->route('projects.index');
    
        /*if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Datos incorrectos.',
                'errors' => $validator->errors(),
            ], 422);
        }*/

    
        // Respuestas
        /*if ($request->expectsJson()) {
            return response()->json([
                'status' => true,
                'message' => 'Proyecto añadido correctamente.',
                'project' => $project,
            ], 201);
        } else {
            if ($collaborators){

            }else{
                return redirect()->route('projects.index');
            }
        }*/
    }

    public function destroy(Project $project_id){
        $project_id->delete();
        return true;
    }

    public function update(Request $request, Project $project_id){
        $enum = ['En curso', 'En riesgo', 'Terminado'];

        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:10000'],
            'status' => ['required',Rule::in($enum)]
        ]);

        $project_id->update($request->all());

        return redirect()->route('projects.show', $project_id->id);
    }

    public function show(int $project_id){
        $project = Project::find($project_id);
        return $project;
    }

    public function index(){
        $project = Project::all();
        return $project;
    }
}
