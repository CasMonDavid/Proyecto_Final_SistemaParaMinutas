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
        //Proyecto 1
        $proyecto = new Project();
        $proyecto->name = "Plataforma de Reservas Turísticas";
        $proyecto->description = "Una aplicación web para conectar viajeros con guías locales, permitiendo reservar tours personalizados y experiencias únicas.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 1;
        $proyecto->save();

        //Proyecto 2
        $proyecto = new Project();
        $proyecto->name = "Control de Inventarios Inteligente";
        $proyecto->description = "Aplicación móvil para ayudar a los usuarios a crear y mantener hábitos positivos mediante recordatorios y análisis de progreso.";
        $proyecto->status = "Terminado";
        $proyecto->created_by = 4;
        $proyecto->save();

        //Proyecto 3
        $proyecto = new Project();
        $proyecto->name = "App de Seguimiento de Hábitos";
        $proyecto->description = "Aplicación móvil para ayudar a los usuarios a crear y mantener hábitos positivos mediante recordatorios y análisis de progreso.";
        $proyecto->status = "En riesgo";
        $proyecto->created_by = 1;
        $proyecto->save();

        //Proyecto 4
        $proyecto = new Project();
        $proyecto->name = "Gestión de Eventos Virtuales";
        $proyecto->description = "Plataforma para organizar eventos virtuales con funciones interactivas como salas de discusión, votaciones en vivo y transmisión en HD.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 2;
        $proyecto->save();

        //Proyecto 5
        $proyecto = new Project();
        $proyecto->name = "Sistema de Monitoreo Ambiental";
        $proyecto->description = "Herramienta para rastrear y reportar condiciones ambientales (calidad del aire, temperatura, humedad) en tiempo real mediante sensores IoT.";
        $proyecto->status = "Terminado";
        $proyecto->created_by = 3;
        $proyecto->save();

        //Proyecto 6
        $proyecto = new Project();
        $proyecto->name = "WeatherTrack";
        $proyecto->description = "Una aplicación móvil que consume una API de clima, solicita permisos de geolocalización automáticamente, y muestra el pronóstico del tiempo basado en la ubicación del usuario. Está diseñada tanto para Android como para ser publicada como una página web.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 1;
        $proyecto->save();

        //Proyecto 7
        $proyecto = new Project();
        $proyecto->name = "ShopVerse";
        $proyecto->description = "Un videojuego en línea desarrollado en México, que busca ser comercializado a través de plataformas web. Incluye un sistema de compra y personalización de personajes.";
        $proyecto->status = "En curso";
        $proyecto->created_by = 4;
        $proyecto->save();

        //Proyecto 8
        $proyecto = new Project();
        $proyecto->name = "VueFlow CRM";
        $proyecto->description = "Un sistema CRM (Customer Relationship Management) desarrollado con Vue.js para facilitar la gestión de clientes y ventas. Utiliza modales y opciones preconfiguradas en formularios dinámicos para optimizar la experiencia del usuario.";
        $proyecto->status = "En riesgo";
        $proyecto->created_by = 5;
        $proyecto->save();

        //Proyecto 9
        $proyecto = new Project();
        $proyecto->name = "Laravel Cloud API";
        $proyecto->description = "Una API construida en Laravel 11 para manejar operaciones de backend para aplicaciones web y móviles. Diseñada con alta seguridad, incluye integración de respuestas JSON y soporte multiusuario.";
        $proyecto->status = "Terminado";
        $proyecto->created_by = 6;
        $proyecto->save();

        //Proyecto 10
        $proyecto = new Project();
        $proyecto->name = "EduKotlin";
        $proyecto->description = "Una app educativa desarrollada en Kotlin, diseñada para estudiantes de programación. Proporciona guías interactivas, retos de código y evaluaciones automatizadas.";
        $proyecto->status = "En riesgo";
        $proyecto->created_by = 1;
        $proyecto->save();
    }
}
