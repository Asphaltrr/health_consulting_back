<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultatConsultationsTable extends Migration
{
    public function up()
    {
        Schema::create('resultat_consultations', function (Blueprint $table) {
            $table->id();
            $table->string('ordonnance');   
            $table->text('resume');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
