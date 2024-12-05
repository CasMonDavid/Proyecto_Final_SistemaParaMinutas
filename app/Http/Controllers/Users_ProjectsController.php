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
        return $user_project;
    }

    public function getByProject(Request $request, Project $project){
        $UserProject = User_project::where('project_id', '=', $project->id)
            ->get();
        return $UserProject;
    }

    public function index(){
        $user_project = User_project::all();
        return $user_project;
    }
}
