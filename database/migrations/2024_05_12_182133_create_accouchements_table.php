<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccouchementsTable extends Migration
{
    public function up()
    {
        Schema::create('accouchements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_hospitalisation')->constrained('hospitalisations');
            $table->date('date_accouchement');
            $table->time('heure_accouchement');
            $table->text('details');
            $table->text('remarques')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('accouchements');
    }
}
