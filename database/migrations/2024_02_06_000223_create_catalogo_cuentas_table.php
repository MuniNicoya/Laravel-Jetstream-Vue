<?php

use App\Models\Team;
use App\Models\User;
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
        Schema::create('catalogo_cuentas', function (Blueprint $table) {
            $table->id();
            // -- CICAC - Catálogo Oficoal 2024
            $table->integer('cuenta')->default(0);
            $table->string('descripcion');
            $table->string('signo');
            $table->integer('nivel')->default(0);
            $table->timestamp('vigencia');
            $table->integer('activa')->default(1);
            $table->integer('tipo')->default(14); 
            // ------   Addicional Fields 
            $table->integer('status')->default(1);
            $table->integer('type')->default(0);         
            $table->foreignIdFor(Team::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catalogo_cuentas');
    }
};
