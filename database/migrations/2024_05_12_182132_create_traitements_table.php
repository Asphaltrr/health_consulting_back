<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraitementsTable extends Migration
{
    public function up()
    {
        Schema::create('traitements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_consultation')->constrained('consultations');
            $table->text('description');
            $table->integer('duree'); // Assuming duration in days or hours, specify accordingly
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('traitements');
    }
}
