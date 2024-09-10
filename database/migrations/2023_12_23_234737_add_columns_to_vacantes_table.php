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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string("titulo");
            $table->string('empresa');
            $table->date('ultimo_dia');
            $table->text('descripcion');
            $table->string('imagen');
            $table->Integer('publicado')->default('0');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('vacantes', function (Blueprint $table) {
            // $table->dropForeign("vacantes_categoria_id_foreign");
            // $table->dropForeign("vacantes_salario_id_foreign");
            // $table->dropForeign("vacantes_user_id_foreign");

            $table->dropColumn([
                "titulo", 
                'empresa', 
                'ultimo_dia', 
                'descripcion', 
                'imagen', 
                'publicado',
                // 'categoria_id',
                // 'salario_id',
                // 'user_id',
            ]);

            $table->dropConstrainedForeignId('categoria_id');
            $table->dropConstrainedForeignId('salario_id');
            $table->dropConstrainedForeignId('user_id');
        });
    }
};
