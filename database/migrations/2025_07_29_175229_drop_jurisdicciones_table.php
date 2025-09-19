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
        Schema::dropIfExists('jurisdicciones');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('jurisdicciones', function (Blueprint $table) {
            $table->unsignedInteger('idestado');
            $table->unsignedInteger('idjurisdiccion');
            $table->string('jurisdiccion');
            $table->primary(['idestado', 'idjurisdiccion']);
            $table->foreign('idestado')->references('idestado')->on('estados')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });

        DB::statement('ALTER TABLE jurisdicciones CHANGE idestado idestado INT(2) UNSIGNED ZEROFILL NOT NULL');
        DB::statement('ALTER TABLE jurisdicciones CHANGE idjurisdiccion idjurisdiccion INT(2) UNSIGNED ZEROFILL NOT NULL');
    }
};
