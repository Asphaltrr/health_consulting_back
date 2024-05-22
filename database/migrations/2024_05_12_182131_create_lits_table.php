<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitsTable extends Migration
{
    public function up()
    {
        Schema::create('lits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_chambre')->constrained('chambres'); // Cette ligne établit la contrainte de clé étrangère.
            $table->string('statut'); // Corrigez également la faute de frappe 'satut' à 'statut' dans votre modèle.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lits');
    }
}
