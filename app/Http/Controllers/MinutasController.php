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
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MinutasController extends Controller
{
    public function store(Request $request){
        $enum = ['Confirmado','Justificado','Ausente'];
        DB::beginTransaction();
        
        try{
            $validated = $request->validate([
                'id_project' => ['required','exists:projects,id'],
                'created_by' => ['required', 'exists:users,id'],
                'date' => ['required','date_equals:date'],
                'direction' => ['required', 'string','min:3','max:1000'],
                'attendance' => ['required', 'array'],
                'attendance.*.id_user' => ['required','exists:users,id'],
                'attendance.*.status' => ['required',Rule::in($enum)],
                'decisions' => ['required','array'],
                'decisions.description' => ['required','string','min:3','max:10000'],
                'action' => ['required','array'],
                'action.description' => ['required','string','min:3','max:10000'],
            ]);

            //Crea la minita
            $minuta = Minuta::create([
                'id_project' => $validated['id_project'],
                'created_by' => $validated['created_by'],
                'date' => $validated['date'],
                'direction' => $validated['direction'],
            ]);

            //Crea la asistencia
            $assists = $validated['attendance'];
            foreach ($assists as $attendance){
                Attendance::create([
                    'id_minuta' => $minuta->id,
                    'id_user' => $assists['id_user'],
                    'status' => $assists['status'],
                ]);
            }

            //Crea los temas
            $topic = Topic::create([
                'id_minuta' => $minuta->id
            ]);

            //Crea las desiciones
            $decisions = $validated['decisions'];
            foreach ($decisions as $decision){
                Decision::create([
                    'id_topic' => $topic->id,
                    'description' => $decisions['description']
                ]);
            }

            //Crea las acciones
            $actions = $validated['action'];
            foreach ($actions as $action){
                Elements_action::create([
                    'id_topic' => $topic->id,
                    'description' => $actions['description']
                ]);
            }

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Minuta registrada con exito.',
                'minuta' => $minuta
            ],200);

        }catch(Exception $e){
            DB::rollBack();
            $massage = $e->getMessage();
        }
        return response()->json([
            'status' => false,
            'message' => 'No fue posible guardar la minuta.',
            'error' => $massage?? "Error de validación",
        ],500);
    }

    public function destroy(){
        
    }

    public function update(){
        
    }

    public function show(){
        
    }

    public function index(){
        $minuta = Minuta::all();
        return response()->json($minuta,200);
    }
}
