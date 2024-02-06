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
        Schema::create('catalogo_cuentas', function (Blueprint $table) {
            $table->id();
            $table->integer('code')->default(0);
            $table->string('description');
            $table->string('sign');
            $table->integer('level')->default(0);
            $table->timestamp('vigencia');
            $table->integer('is_enabled')->default(1);
            $table->integer('type')->default(0);         
            $table->integer('created_by')->default(0);
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
