<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->foreignId('minuta_id')
                ->references('id')->on('minutas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->longText('description');
            $table->timestamps();
        });

        Schema::create('elements_action', function (Blueprint $table) {
            $table->id();
            $table->foreignId('topic_id')
                ->references('id')->on('topics')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->longText('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('decisions');
        Schema::dropIfExists('elements_action');
        Schema::dropIfExists('topics');
    }
};
