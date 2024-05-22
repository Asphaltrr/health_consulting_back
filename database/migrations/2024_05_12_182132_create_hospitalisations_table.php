<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalisationsTable extends Migration
{
    public function up()
    {
        Schema::create('hospitalisations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_consultation')->constrained('consultations');
            $table->foreignId('id_lit')->constrained('lits');
            $table->date('date_entree');
            $table->date('date_sortie')->nullable();
            $table->string('raison');
            $table->string('statut_hospitalisation');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hospitalisations');
    }
}
