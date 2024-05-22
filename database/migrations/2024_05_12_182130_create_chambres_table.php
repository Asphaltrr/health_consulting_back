<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChambresTable extends Migration
{
    public function up()
    {
        Schema::create('chambres', function (Blueprint $table) {
            $table->id(); // Assurez-vous que cette ligne est présente pour créer une clé primaire auto-increment.
            $table->integer('nombre_lits');
            $table->integer('etage');
            $table->string('numero_chambre');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chambres');
    }
}
