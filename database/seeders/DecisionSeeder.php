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
    }
}
