<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyecto = new Project();
        $proyecto->name = "Plataforma de Reservas Turísticas";
        $proyecto->description = "Una aplicación web para conectar viajeros con guías locales, permitiendo reservar tours personalizados y experiencias únicas.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 1;
        $proyecto->save();

        $proyecto = new Project();
        $proyecto->name = "Control de Inventarios Inteligente";
        $proyecto->description = "Aplicación móvil para ayudar a los usuarios a crear y mantener hábitos positivos mediante recordatorios y análisis de progreso.";
        $proyecto->status = "Terminado";
        $proyecto->created_by = 4;
        $proyecto->save();

        $proyecto = new Project();
        $proyecto->name = "App de Seguimiento de Hábitos";
        $proyecto->description = "Aplicación móvil para ayudar a los usuarios a crear y mantener hábitos positivos mediante recordatorios y análisis de progreso.";
        $proyecto->status = "En riesgo";
        $proyecto->created_by = 1;
        $proyecto->save();

        $proyecto = new Project();
        $proyecto->name = "Gestión de Eventos Virtuales";
        $proyecto->description = "Plataforma para organizar eventos virtuales con funciones interactivas como salas de discusión, votaciones en vivo y transmisión en HD.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 2;
        $proyecto->save();

        $proyecto = new Project();
        $proyecto->name = "Sistema de Monitoreo Ambiental";
        $proyecto->description = "Herramienta para rastrear y reportar condiciones ambientales (calidad del aire, temperatura, humedad) en tiempo real mediante sensores IoT.";
        $proyecto->status = "Terminado";
        $proyecto->created_by = 3;
        $proyecto->save();
    }
}
