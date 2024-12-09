<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Minuta;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinutasController extends Controller
{
    public function store(Request $request){
        $enum = ['Confirmado','Justificado','Ausente'];

        $validated = $request->validate([
            'id_project' => ['required','exists:projects,id'],
            'created_by' => ['required', 'exists:users,id'],
            'date' => ['required','date_equals:date'],
            'direction' => ['required', 'string','min:3','max:1000'],
            'attendance' => ['required', 'array'],
            'attendance.*.id_user' => ['required','exists:users,id'],
        ]);

        DB::beginTransaction();
        try{
            $minuta = Minuta::create($validated);



        }catch(Exception $e){
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'No fue posible guardar la minuta.',
                'error' => $e->getMessage(),
            ],500);
        }
    }

    public function destroy(){
        
    }

    public function update(){
        
    }

    public function show(){
        
    }

    public function index(){
        
    }
}
