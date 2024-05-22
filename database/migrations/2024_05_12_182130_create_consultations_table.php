<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_patient')->constrained('patients');
            $table->foreignId('id_resultat_consultation')->nullable()->constrained('resultat_consultations');
            $table->date('date');
            $table->time('heure');
            $table->decimal('temperature', 5, 2)->nullable();
            $table->decimal('poids', 5, 2)->nullable();
            $table->integer('pression_arterielle')->nullable();
            $table->integer('frequence_cardiaque')->nullable();
            $table->integer('frequence_respiratoire')->nullable();
            // Corrigé pour être un type de champ texte si c'est destiné à stocker du texte
            $table->text('motif_visite')->nullable();
            $table->text('symptomes')->nullable();
            $table->text('diagnostic')->nullable();
            $table->text('remarques')->nullable();
            $table->enum('statut', ['en attente', 'consulté', 'à examiner', 'examiné', 'hospitalisé', 'accouchement'])->default('en attente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}

