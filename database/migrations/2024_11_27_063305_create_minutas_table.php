<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('minutas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')
                ->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dateTime('date');
            $table->longText('direction');
            $table->timestamps();
        });

        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_project')
                ->references('id')->on('projects')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreignId('created_by')
                ->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->dateTime('date');
            $table->longText('direction');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('minutas');
    }
};
