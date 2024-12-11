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

        // Minuta 6
        $minuta = new Minuta();
        $minuta->project_id = 6;
        $minuta->created_by = 1;
        $minuta->date = "2024-12-20 01:25:59";
        $minuta->direction = "Avenida Independencia 456, Centro Histórico, Ciudad de México, CP 06010";
        $minuta->save();

        // Minuta 7
        $minuta = new Minuta();
        $minuta->project_id = 7;
        $minuta->created_by = 4;
        $minuta->date = "2025-04-13 13:00:00";
        $minuta->direction = "Calle Magnolia 123, Colonia Las Rosas, Monterrey, Nuevo León, CP 64000";
        $minuta->save();

        // Minuta 8
        $minuta = new Minuta();
        $minuta->project_id = 8;
        $minuta->created_by = 5;
        $minuta->date = "2025-02-28 18:00:00";
        $minuta->direction = "Callejón del Sol 789, Barrio Antiguo, Guadalajara, Jalisco, CP 44100";
        $minuta->save();

        // Minuta 9
        $minuta = new Minuta();
        $minuta->project_id = 9;
        $minuta->created_by = 6;
        $minuta->date = "2025-05-08 08:00:00";
        $minuta->direction = "Boulevard del Río 321, Fraccionamiento Jardines, Tijuana, Baja California, CP 22000";
        $minuta->save();

        // Minuta 10
        $minuta = new Minuta();
        $minuta->project_id = 10;
        $minuta->created_by = 1;
        $minuta->date = "2024-11-23 12:30:00";
        $minuta->direction = "Camino Real 654, Colonia San Pedro, Puebla, Puebla, CP 72000";
        $minuta->save();

        // Minuta 11
        $minuta = new Minuta();
        $minuta->project_id = 4;
        $minuta->created_by = 2;
        $minuta->date = "2024-11-23 11:10:00";
        $minuta->direction = "Calle Sierra Verde 987, Fraccionamiento Los Encinos, Querétaro, Querétaro, CP 76000";
        $minuta->save();

        // Minuta 12
        $minuta = new Minuta();
        $minuta->project_id = 8;
        $minuta->created_by = 5;
        $minuta->date = "2024-04-14 06:45:00";
        $minuta->direction = "Avenida del Mar 159, Zona Dorada, Mazatlán, Sinaloa, CP 82110";
        $minuta->save();

        // Minuta 13
        $minuta = new Minuta();
        $minuta->project_id = 2;
        $minuta->created_by = 4;
        $minuta->date = "2026-07-19 15:50:00";
        $minuta->direction = "Calle Luna Azul 234, Colonia Buenavista, Mérida, Yucatán, CP 97000";
        $minuta->save();

        // Minuta 14
        $minuta = new Minuta();
        $minuta->project_id = 5;
        $minuta->created_by = 3;
        $minuta->date = "2026-01-05 15:10:00";
        $minuta->direction = "Calle La Paz 876, Barrio El Carmen, Oaxaca de Juárez, Oaxaca, CP 68000";
        $minuta->save();

        // Minuta 15
        $minuta = new Minuta();
        $minuta->project_id = 1;
        $minuta->created_by = 1;
        $minuta->date = "2025-06-15 16:35:00";
        $minuta->direction = "Carretera Panamericana 4321, Colonia Los Álamos, León, Guanajuato, CP 37000";
        $minuta->save();

    }
}
