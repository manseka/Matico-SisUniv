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
        // Modificar la tabla docentes para cambiar el nombre a la columna user_id por usuario_id
        Schema::table('docentes', function (Blueprint $table) {
            $table->renameColumn('user_id', 'usuario_id');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
