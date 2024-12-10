<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Minuta;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function show(int $attendance_id){
        $attendance = Attendance::find($attendance_id);
        return response()->json($attendance, 200);
    }

    public function getByIdMinuta(int $minuta_id){
        $attendance = Attendance::where('minuta_id','=',$minuta_id)->get();
        return response()->json($attendance, 200);
    }

    public function index(){
        $attendance = Attendance::all();
        return response()->json($attendance, 200);
    }
}
