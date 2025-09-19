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
        Schema::table('municipios', function (Blueprint $table) {
            $table->dropForeign(['idestado', 'idjurisdiccion']);
            $table->dropColumn(['idjurisdiccion']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('municipios', function (Blueprint $table) {
            $table->unsignedInteger('idjurisdiccion')->nullable();

            $table->foreign(['idestado', 'idjurisdiccion'])->references(['idestado', 'idjurisdiccion'])->on('jurisdicciones')->onDelete('RESTRICT')->onUpdate('CASCADE');
        });

        DB::statement('ALTER TABLE municipios CHANGE idjurisdiccion idjurisdiccion INT(2) UNSIGNED ZEROFILL NOT NULL');
    }
};
