<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->enum('status',['En curso','En riesgo','Terminado']);
            $table->timestamps();
            $table->foreignId('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::create('user_project', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('id_proyect')
                ->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('role');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('user_project');
        Schema::dropIfExists('projects');
    }
};
