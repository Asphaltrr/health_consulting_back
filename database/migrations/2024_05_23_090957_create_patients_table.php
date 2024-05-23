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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('nom_complet');
            $table->date('date_de_naissance')->nullable();
            $table->string('sexe');
            $table->string('adresse')->nullable();
            $table->string('numero_de_telephone')->nullable();
            $table->string('email')->nullable();
            $table->text('antecedents_medicaux')->nullable();
            $table->string('groupe_sanguin')->nullable();
            $table->text('medicaments_actuels')->nullable();
            $table->string('statut_marital')->nullable();
            $table->integer('nombre_enfants')->nullable();
            $table->string('profession')->nullable();
            $table->boolean('consentement_aux_donnees')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
