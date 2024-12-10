<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User_project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class Users_ProjectsController extends Controller
{
    public function show(int $user_project_id){
        $user_project = User_project::find($user_project_id);
        return response()->json($user_project, 200);
    }

    public function getByProject(Request $request, Project $project){
        $user_project = User_project::where('project_id', '=', $project->id)
            ->get();
            return response()->json($user_project, 200);
    }

    public function index(){
        $user_project = User_project::all();
        return response()->json($user_project, 200);
    }
}
