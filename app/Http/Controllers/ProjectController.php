<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Decision;
use App\Models\Elements_action;
use App\Models\Minuta;
use App\Models\Topic;
use Exception;
use Illuminate\Http\Request;
use App\Models\Project;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ProjectController extends Controller
{
    public function update(Request $request, $id)
    {
        // Validación de los datos (asegúrate de que los campos sean los correctos)
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        try {
            // Busca el proyecto por ID
            $project = Project::findOrFail($id);
            
            // Actualiza los datos del proyecto
            $project->update($validated);

            return response()->json($project, 200);
        } catch (\Exception $e) {
            // Registra el error si algo falla

            return response()->json(['error' => 'Error interno del servidor'], 500);
        }
    }

}
