<?php

namespace Database\Seeders;

use App\Models\Elements_action;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Elementos de accion 1
        $action = new Elements_action();
        $action->topic_id = 1;
        $action->description = "Configurar integración de Stripe en entorno de desarrollo antes del 15 de diciembre.";
        $action->save();

        //Elementos de accion 2
        $action = new Elements_action();
        $action->topic_id = 2;
        $action->description = "Entrenar modelo inicial con datos de prueba antes del próximo mes.";
        $action->save();

        //Elementos de accion 3
        $action = new Elements_action();
        $action->topic_id = 3;
        $action->description = "Configurar el entorno de desarrollo y comenzar a implementar funcionalidades básicas.";
        $action->save();

        //Elementos de accion 4
        $action = new Elements_action();
        $action->topic_id = 4;
        $action->description = "Crear un prototipo funcional con WebRTC antes del próximo mes.";
        $action->save();

        //Elementos de accion 5
        $action = new Elements_action();
        $action->topic_id = 5;
        $action->description = "Configurar un servidor MQTT para pruebas con datos simulados.";
        $action->save();

        //Elementos de accion 6
        $action = new Elements_action();
        $action->topic_id = 1;
        $action->description = "Diseñar y validar prototipos para pantallas clave (inicio, búsqueda, reservas) antes del próximo sprint.";
        $action->save();

        //Elementos de accion 7
        $action = new Elements_action();
        $action->topic_id = 2;
        $action->description = "Migrar esquema actual a PostgreSQL y realizar pruebas de carga.";
        $action->save();
        
        //Elementos de accion 8
        $action = new Elements_action();
        $action->topic_id = 3;
        $action->description = "Diseñar prototipos para las insignias e integrar una API de recompensas.";
        $action->save();
    }
}
