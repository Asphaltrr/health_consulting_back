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
        Schema::create('lits', function (Blueprint $table) {
            $table->id();
            $table->integer('numero');
            $table->foreignId('id_chambre')->constrained('chambres');
            $table->string('statut');
            $table->timestamps();

            // Définir une contrainte d'unicité sur la combinaison de numero et id_chambre
            $table->unique(['numero', 'id_chambre'], 'numero_lit_chambre_unique');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lits');
    }
};
