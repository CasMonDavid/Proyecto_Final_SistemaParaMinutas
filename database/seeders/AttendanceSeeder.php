<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Asistencia 1
        $attendance = new Attendance();
        $attendance->minuta_id = 1;
        $attendance->user_id = 2;
        $attendance->status= "Confirmado";
        $attendance->save();

        // Asistencia 2
        $attendance = new Attendance();
        $attendance->minuta_id = 2;
        $attendance->user_id = 1;
        $attendance->status= "Ausente";
        $attendance->save();

        // Asistencia 3
        $attendance = new Attendance();
        $attendance->minuta_id = 3;
        $attendance->user_id = 4;
        $attendance->status= "Justificado";
        $attendance->save();

        // Asistencia 4
        $attendance = new Attendance();
        $attendance->minuta_id = 4;
        $attendance->user_id = 3;
        $attendance->status= "Justificado";
        $attendance->save();

        // Asistencia 5
        $attendance = new Attendance();
        $attendance->minuta_id = 5;
        $attendance->user_id = 1;
        $attendance->status= "Justificado";
        $attendance->save();
    }
}
