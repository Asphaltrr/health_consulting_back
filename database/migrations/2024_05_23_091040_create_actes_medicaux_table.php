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
        Schema::create('actes_medicaux', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_traitement')->constrained('traitements');
            $table->text('description');
            $table->dateTime('date_et_heure');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actes_medicaux');
    }
};
