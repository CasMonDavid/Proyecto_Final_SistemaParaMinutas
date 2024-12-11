<?php

namespace Database\Seeders;

use App\Models\Decision;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DecisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Desicion 1
        $decision = new Decision();
        $decision->topic_id = 1;
        $decision->description = "Se prioriza Stripe como pasarela de pago principal.";
        $decision->save();

        //Desicion 2
        $decision = new Decision();
        $decision->topic_id = 2;
        $decision->description = "Se utilizará un modelo basado en redes neuronales simples.";
        $decision->save();

        //Desicion 3
        $decision = new Decision();
        $decision->topic_id = 3;
        $decision->description = "Se utilizará Flutter para desarrollar la aplicación móvil.";
        $decision->save();

        //Desicion 4
        $decision = new Decision();
        $decision->topic_id = 4;
        $decision->description = "Se implementará WebRTC como tecnología base para transmisiones.";
        $decision->save();

        //Desicion 5
        $decision = new Decision();
        $decision->topic_id = 5;
        $decision->description = "Se utilizarán sensores IoT compatibles con MQTT para la comunicación.";
        $decision->save();

        //Desicion 6
        $decision = new Decision();
        $decision->topic_id = 1;
        $decision->description = "La interfaz será primero para dispositivos móviles.";
        $decision->save();

        //Desicion 7
        $decision = new Decision();
        $decision->topic_id = 2;
        $decision->description = "La base de datos será PostgreSQL debido a sus capacidades avanzadas.";
        $decision->save();

        //Desicion 8
        $decision = new Decision();
        $decision->topic_id = 3;
        $decision->description = "El sistema de recompensas incluirá insignias y descuentos en servicios.";
        $decision->save();

        //Desicion 9
        $decision = new Decision();
        $decision->topic_id = 6;
        $decision->description = "Usar Laravel 11 como framework.";
        $decision->save();

        //Desicion 10
        $decision = new Decision();
        $decision->topic_id = 7;
        $decision->description = "Implementar un diseño minimalista.";
        $decision->save();

        //Desicion 11
        $decision = new Decision();
        $decision->topic_id = 8;
        $decision->description = "Utilizar OpenWeather como proveedor.";
        $decision->save();

        //Desicion 12
        $decision = new Decision();
        $decision->topic_id = 9;
        $decision->description = "Registrar una cuenta y obtener las credenciales API.";
        $decision->save();

        //Desicion 13
        $decision = new Decision();
        $decision->topic_id = 10;
        $decision->description = "Implementar autenticación JWT.";
        $decision->save();

        //Desicion 14
        $decision = new Decision();
        $decision->topic_id = 11;
        $decision->description = "Usar un hosting con soporte para Laravel.";
        $decision->save();

        //Desicion 15
        $decision = new Decision();
        $decision->topic_id = 12;
        $decision->description = "Implementar un modelo freemium.";
        $decision->save();

        //Desicion 16
        $decision = new Decision();
        $decision->topic_id = 13;
        $decision->description = "Utilizar modales para agregar y editar datos.";
        $decision->save();

        //Desicion 17
        $decision = new Decision();
        $decision->topic_id = 14;
        $decision->description = "Implementar middleware de validación.";
        $decision->save();

        //Desicion 18
        $decision = new Decision();
        $decision->topic_id = 15;
        $decision->description = "Solicitar permisos al iniciar la app.";
        $decision->save();

        //Desicion 19
        $decision = new Decision();
        $decision->topic_id = 16;
        $decision->description = "Usar una metodología ágil (Scrum).";
        $decision->save();

        //Desicion 20
        $decision = new Decision();
        $decision->topic_id = 17;
        $decision->description = "Realizar pruebas de seguridad en endpoints sensibles.";
        $decision->save();

        //Desicion 21
        $decision = new Decision();
        $decision->topic_id = 18;
        $decision->description = "Usar una metodología ágil (Scrum).";
        $decision->save();

        //Desicion 22
        $decision = new Decision();
        $decision->topic_id = 19;
        $decision->description = "Probar con dispositivos reales y diferentes versiones de Android.";
        $decision->save();

        //Desicion 23
        $decision = new Decision();
        $decision->topic_id = 20;
        $decision->description = "Realizar reuniones diarias para seguimiento de tareas.";
        $decision->save();
    }
}
