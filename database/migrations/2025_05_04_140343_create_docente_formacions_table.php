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
        Schema::create('docente_formacions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente_id')->unique();
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('cascade');
            $table->string('titulo')->nullable();
            $table->string('nivel')->nullable();
            $table->string('institucion')->nullable();
            $table->date('ano_graduacion')->nullable();
            $table->text('archivo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_formacions');
    }
};
