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
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_consultation')->constrained('consultations');
            $table->text('description');
            $table->json('noms_fichiers')->nullable(); // Ajouté pour stocker les noms des fichiers
            $table->json('paths_fichiers')->nullable(); // Ajouté pour stocker les chemins des fichiers
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};
