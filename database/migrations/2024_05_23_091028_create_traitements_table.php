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
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignId('id_consultation')->constrained('consultations');
            $table->text('description');
            $table->integer('duree')->nullable(); // En jours, ou autre unité de mesure appropriée
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traitements');
    }
};
