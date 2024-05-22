<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();  // Crée automatiquement un entier incrémenté
            $table->string('nom_complet');
            $table->date('date_de_naissance');
            $table->string('sexe');
            $table->string('adresse')->nullable();
            $table->string('numero_de_telephone')->nullable()->unique();  // Assurez-vous que le numéro est unique
            $table->string('email')->nullable()->unique();  // Assurez-vous que l'email est unique
            $table->text('antecedents_medicaux')->nullable();
            $table->string('groupe_sanguin', 3)->nullable();  // Nouveau champ pour le groupe sanguin
            $table->text('medicaments_actuels')->nullable();  // Nouveau champ pour les médicaments actuels
            $table->string('statut_marital')->nullable();  // Nouveau champ pour le statut marital
            $table->integer('nombre_enfants')->nullable();  // Nouveau champ pour le nombre d'enfants
            $table->string('profession')->nullable();  // Nouveau champ pour la profession
            $table->boolean('consentement_aux_donnees')->default(false);  // Nouveau champ pour le consentement aux données
            $table->timestamps();  // Crée created_at et updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
