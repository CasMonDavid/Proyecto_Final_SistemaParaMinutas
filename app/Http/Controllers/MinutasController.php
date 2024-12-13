<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Decision;
use App\Models\Elements_action;
use App\Models\Minuta;
use App\Models\Topic;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MinutasController extends Controller
{
    public function store(Request $request)
    {
        $enum = ['Confirmado', 'Justificado', 'Ausente'];
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'project_id' => ['required', 'exists:projects,id'],
                'created_by' => ['required', 'exists:users,id'],
                'date' => ['required', 'date_equals:date'],
                'direction' => ['required', 'string', 'min:3', 'max:1000'],
                'attendance' => ['required', 'array'],
                'attendance.*.id_user' => ['required', 'exists:users,id'],
                'attendance.*.status' => ['required', Rule::in($enum)],
                'topics' => ['required', 'array'],
                'topics.*.decisions' => ['required', 'array'],
                'topics.*.decisions.*.description' => ['required', 'string', 'min:3', 'max:10000'],
                'topics.*.actions' => ['required', 'array'],
                'topics.*.actions.*.description' => ['required', 'string', 'min:3', 'max:10000']
            ]);

            //Crea la minuta
            $minuta = Minuta::create([
                'project_id' => $validated['project_id'],
                'created_by' => $validated['created_by'],
                'date' => $validated['date'],
                'direction' => $validated['direction'],
            ]);

            //Crea la asistencia
            $assists = $validated['attendance'];
            foreach ($assists as $attendance) {
                Attendance::create([
                    'minuta_id' => $minuta->id,
                    'user_id' => $attendance['id_user'],
                    'status' => $attendance['status'],
                ]);
            }

            $topics = $validated['topics'];

            foreach ($topics as $motif) {
                //Crea los temas
                $topic = Topic::create([
                    'minuta_id' => $minuta->id
                ]);

                //Crea las desiciones
                $decisions = $motif['decisions'];
                foreach ($decisions as $decision) {
                    Decision::create([
                        'topic_id' => $topic->id,
                        'description' => $decision['description']
                    ]);
                }
                //Crea las acciones
                $actions = $motif['actions'];
                foreach ($actions as $action) {
                    Elements_action::create([
                        'topic_id' => $topic->id,
                        'description' => $action['description']
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Minuta registrada con exito.',
                'minuta' => $minuta
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            $massage = $e->getMessage();
        }
        return response()->json([
            'status' => false,
            'message' => 'No fue posible guardar la minuta.',
            'error' => $massage ?? "Error de validación",
        ], 422);
    }

    public function destroy(Minuta $minuta_id)
    {
        $minuta_id->delete();
        return response()->json([
            'status' => true,
            'message' => 'Minuta eliminada con exito.'
        ]);
    }

    public function update(Request $request, int $minuta_id)
    {
        $enum = ['Confirmado', 'Justificado', 'Ausente'];
        DB::beginTransaction();

        try {
            $validated = $request->validate([
                'date' => ['required', 'date_equals:date'],
                'direction' => ['required', 'string', 'min:3', 'max:1000'],
                'attendance' => ['required', 'array'],
                'attendance.*.id_user' => ['required', 'exists:users,id'],
                'attendance.*.status' => ['required', Rule::in($enum)],
                'topics' => ['required', 'array'],
                'topics.*.decisions' => ['required', 'array'],
                'topics.*.decisions.*.description' => ['required', 'string', 'min:3', 'max:10000'],
                'topics.*.actions' => ['required', 'array'],
                'topics.*.actions.*.description' => ['required', 'string', 'min:3', 'max:10000']
            ]);

            $minuta = Minuta::findOrFail($minuta_id);

            //Crea la minuta
            $minuta->update([
                'date' => $validated['date'],
                'direction' => $validated['direction'],
            ]);

            Attendance::where('minuta_id', $minuta_id)->delete();
            //Crea la asistencia
            $assists = $validated['attendance'];
            foreach ($assists as $attendance) {
                Attendance::create([
                    'minuta_id' => $minuta->id,
                    'user_id' => $attendance['id_user'],
                    'status' => $attendance['status'],
                ]);
            }

            Topic::where('minuta_id', $minuta_id)->delete();
            $topics = $validated['topics'];
            foreach ($topics as $motif) {
                //Crea los temas
                $topic = Topic::create([
                    'minuta_id' => $minuta->id
                ]);

                //Crea las desiciones
                $decisions = $motif['decisions'];
                foreach ($decisions as $decision) {
                    Decision::create([
                        'topic_id' => $topic->id,
                        'description' => $decision['description']
                    ]);
                }
                //Crea las acciones
                $actions = $motif['actions'];
                foreach ($actions as $action) {
                    Elements_action::create([
                        'topic_id' => $topic->id,
                        'description' => $action['description']
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'status' => true,
                'message' => 'Minuta actualizada con exito.',
                'minuta' => $minuta
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            $massage = $e->getMessage();
        }
        return response()->json([
            'status' => false,
            'message' => 'No fue posible actualizar la minuta.',
            'error' => $massage ?? "Error de validación",
        ], 422);
    }

    public function edit(int $minuta_id){
        $minuta = Minuta::with(['attendance', 'topics_decision', 'topics_action'])->find($minuta_id);
        $users = User::all();
        if (isset($minuta)){
            return view('editminuta', compact('minuta','users'));
        }else{
            return redirect('/home')->with('error','Ocurrio un problema, minuta no existe');
        }
    }

    public function show(int $minuta_id)
    {
        $minuta = Minuta::with(['attendance', 'topics_decision', 'topics_action','usuarios'])->find($minuta_id);
        return response()->json($minuta, 200);
    }

    public function index()
    {
        $minuta = Minuta::with(['attendance', 'topics_decision', 'topics_action'])->get();
        return response()->json($minuta, 200);
    }
}
