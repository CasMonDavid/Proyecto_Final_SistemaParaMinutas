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

        // Asistencia 6
        $attendance = new Attendance();
        $attendance->minuta_id = 6;
        $attendance->user_id = 8;
        $attendance->status= "Confirmado";
        $attendance->save();

        // Asistencia 7
        $attendance = new Attendance();
        $attendance->minuta_id = 7;
        $attendance->user_id = 6;
        $attendance->status= "Ausente";
        $attendance->save();

        // Asistencia 8
        $attendance = new Attendance();
        $attendance->minuta_id = 8;
        $attendance->user_id = 10;
        $attendance->status= "Ausente";
        $attendance->save();

        // Asistencia 9
        $attendance = new Attendance();
        $attendance->minuta_id = 9;
        $attendance->user_id = 1;
        $attendance->status= "Confirmado";
        $attendance->save();

        // Asistencia 10
        $attendance = new Attendance();
        $attendance->minuta_id = 10;
        $attendance->user_id = 9;
        $attendance->status= "Justificado";
        $attendance->save();

        // Asistencia 11
        $attendance = new Attendance();
        $attendance->minuta_id = 8;
        $attendance->user_id = 1;
        $attendance->status= "Confirmado";
        $attendance->save();

        // Asistencia 12
        $attendance = new Attendance();
        $attendance->minuta_id = 4;
        $attendance->user_id = 4;
        $attendance->status= "Ausente";
        $attendance->save();

        // Asistencia 13
        $attendance = new Attendance();
        $attendance->minuta_id = 11;
        $attendance->user_id = 8;
        $attendance->status= "Confirmado";
        $attendance->save();

        // Asistencia 14
        $attendance = new Attendance();
        $attendance->minuta_id = 14;
        $attendance->user_id = 3;
        $attendance->status= "Ausente";
        $attendance->save();

        // Asistencia 15
        $attendance = new Attendance();
        $attendance->minuta_id = 15;
        $attendance->user_id = 5;
        $attendance->status= "Justificado";
        $attendance->save();
    }
}
