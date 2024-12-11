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

        //Elementos de accion 9
        $action = new Elements_action();
        $action->topic_id = 6;
        $action->description = "Configurar el entorno de desarrollo.";
        $action->save();

        //Elementos de accion 10
        $action = new Elements_action();
        $action->topic_id = 7;
        $action->description = "Crear wireframes con un enfoque limpio.";
        $action->save();

        //Elementos de accion 11
        $action = new Elements_action();
        $action->topic_id = 8;
        $action->description = "Registrar una cuenta y obtener las credenciales API.";
        $action->save();

        //Elementos de accion 12
        $action = new Elements_action();
        $action->topic_id = 9;
        $action->description = "Instalar el paquete JWT en Laravel.";
        $action->save();

        //Elementos de accion 13
        $action = new Elements_action();
        $action->topic_id = 10;
        $action->description = "Comprar el dominio y el servicio de hosting.";
        $action->save();

        //Elementos de accion 14
        $action = new Elements_action();
        $action->topic_id = 11;
        $action->description = "Diseñar un esquema de funcionalidades básicas y premium.";
        $action->save();

        //Elementos de accion 15
        $action = new Elements_action();
        $action->topic_id = 12;
        $action->description = "Configurar los modales en el proyecto Vue.";
        $action->save();

        //Elementos de accion 16
        $action = new Elements_action();
        $action->topic_id = 13;
        $action->description = "Crear reglas de validación para cada endpoint.";
        $action->save();

        //Elementos de accion 17
        $action = new Elements_action();
        $action->topic_id = 14;
        $action->description = "Configurar permisos en el archivo AndroidManifest.xml.";
        $action->save();

        //Elementos de accion 18
        $action = new Elements_action();
        $action->topic_id = 15;
        $action->description = "Crear un backlog inicial en una herramienta como Trello.";
        $action->save();

        //Elementos de accion 19
        $action = new Elements_action();
        $action->topic_id = 16;
        $action->description = "Crear el esquema inicial de la base de datos.";
        $action->save();

        //Elementos de accion 20
        $action = new Elements_action();
        $action->topic_id = 17;
        $action->description = "Desplegar en un servidor de prueba.";
        $action->save();

        //Elementos de accion 21
        $action = new Elements_action();
        $action->topic_id = 18;
        $action->description = "Revisar consistencia en tipografías y colores.";
        $action->save();

        //Elementos de accion 22
        $action = new Elements_action();
        $action->topic_id = 19;
        $action->description = "Realizar pruebas de usabilidad con usuarios.";
        $action->save();

        //Elementos de accion 23
        $action = new Elements_action();
        $action->topic_id = 20;
        $action->description = "Implementar el endpoint de geolocalización.";
        $action->save();
    }
}
