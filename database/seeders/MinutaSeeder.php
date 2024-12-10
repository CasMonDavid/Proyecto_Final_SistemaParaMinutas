<?php

namespace Database\Seeders;

use App\Models\Attendance;
use App\Models\Minuta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MinutaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Minuta 1
        $minuta = new Minuta();
        $minuta->project_id = 1;
        $minuta->created_by = 1;
        $minuta->date = "2024-12-09 14:30:45";
        $minuta->direction = "Av. Reforma 123, Colonia Centro, Ciudad de México, CDMX, México.";
        $minuta->save();

        // Minuta 2
        $minuta = new Minuta();
        $minuta->project_id = 1;
        $minuta->created_by = 2;
        $minuta->date = "2025-01-12 08:30:50";
        $minuta->direction = "Calle 10 No. 456, Colonia Jardines del Valle, Monterrey, Nuevo León, México.";
        $minuta->save();

        // Minuta 3
        $minuta = new Minuta();
        $minuta->project_id = 2;
        $minuta->created_by = 4;
        $minuta->date = "2026-01-12 14:30:45";
        $minuta->direction = "Boulevard Benito Juárez 789, Zona Río, Tijuana, Baja California, México.";
        $minuta->save();

        // Minuta 4
        $minuta = new Minuta();
        $minuta->project_id = 3;
        $minuta->created_by = 2;
        $minuta->date = "2024-12-09 14:30:45";
        $minuta->direction = "Calle Independencia 321, Colonia Americana, Guadalajara, Jalisco, México.";
        $minuta->save();

        // Minuta 5
        $minuta = new Minuta();
        $minuta->project_id = 5;
        $minuta->created_by = 4;
        $minuta->date = "2024-04-29 07:15:45";
        $minuta->direction = "Paseo de las Palmas 456, Lomas de Chapultepec, Ciudad de México, CDMX, México.";
        $minuta->save();

    }
}
