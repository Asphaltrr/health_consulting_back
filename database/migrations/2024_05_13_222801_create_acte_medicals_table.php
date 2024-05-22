<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActeMedicalsTable extends Migration
{
    public function up()
    {
        Schema::create('acte_medicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_traitement')->constrained('traitements');
            $table->text('description');
            $table->date('date');
            $table->time('heure');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('acte_medicals');
    }
}
