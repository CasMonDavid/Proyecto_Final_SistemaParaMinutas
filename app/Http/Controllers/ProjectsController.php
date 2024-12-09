<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User_project;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProjectsController extends Controller
{
    // Guarda un proyecto con sus colaboradores
    public function store(Request $request){
        $enum = ['En curso', 'En riesgo', 'Terminado'];

        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:10000'],
            'status' => ['required',Rule::in($enum)],
            'created_by' => ['required','exists:users,id'],
            'collaborators' => ['array'],
            'collaborators.*.user_id' => ['required','exists:users,id'],
            'collaborators.*.role' => ['required','string']
        ]);

        try{
            DB::transaction(function () use ($validated){
                $project = Project::create([
                    'name' => $validated['name'],
                    'description' => $validated['description'],
                    'status' => $validated['status'],
                    'created_by' => $validated['created_by'],
                ]);
    
                $collaborators = $validated['collaborators'];
    
                foreach($collaborators as $collaborator){
                    User_project::create([
                        'project_id' => $project->id,
                        'user_id' => $collaborator['user_id'],
                        'role' => $collaborator['role']
                    ]);
                }

            });
            return response()->json([
                'status' => true,
                'message' => 'Datos de proyectos y colaboradores guardados de forma éxitosa.',
            ],200);
        }catch(Exception $e){
            return response()->json([
                'status' => false,
                'message' => 'No fue posible guardar projectos y colaboradores.',
                'error' => $e->getMessage(),
            ],500);
        }
    }

    // Elimina un proyecto en base a su id
    public function destroy(Project $project_id){
        $project_id->delete();
        return true;
    }

    // Actualiza un proyecto en base a su id
    public function update(Request $request, int $project_id){
        $enum = ['En curso', 'En riesgo', 'Terminado'];

        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string','max:10000'],
            'status' => ['required',Rule::in($enum)],
            'collaborators' => ['array'],
            'collaborators.*.user_id' => ['required','exists:users,id'],
            'collaborators.*.role' => ['required','string']
        ]);

        DB::beginTransaction();
        try{
            $project = Project::findOrFail($project_id);
            $project->update([
                'name' => $validated['name'],
                'description' => $validated['description'],
                'status' => $validated['status'],
            ]);

            $collaborators = $validated['collaborators'];

            User_project::where('project_id',$project_id)->delete();

            foreach($collaborators as $collaborator){
                User_project::create([
                    'project_id' => $project_id,
                    'user_id' => $collaborator['user_id'],
                    'role' => $collaborator['role']
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Datos de proyectos y colaboradores acutalizado de forma éxitosa.',
                'project' => $project,
                'collaborators' => $collaborators,
            ],200);
        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'No fue posible actualizar projectos y colaboradores.',
                'error' => $e->getMessage(),
            ],500);
        }
    }

    // Muestra un proyecto en base a su id
    public function show(int $project_id){
        $project = Project::find($project_id);
        $user_project = User_project::find($project_id);

        return response()->json([
            'status' => true,
            'message' => 'Acción realizada con éxito.',
            'project' => $project,
            'collaborators' => $user_project
        ],200);
    }

    // Muestra todos los proyectos
    public function index(){
        $project = Project::with('collaborators')->get();
        return $project;
    }
}
