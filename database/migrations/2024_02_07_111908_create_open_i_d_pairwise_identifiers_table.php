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
        Schema::create('open_i_d_pairwise_identifiers', function (Blueprint $table) {
          $table->id();
          $table->unsignedBigInteger('user_id')->comment('The ID of the associated user.');
          $table->string('client_id')->comment('The ID of the client associated with the pairwise identifier.');
          $table->string('pairwise_identifier')->unique()->comment('The pairwise identifier.');
          $table->timestamps();

          // Define foreign key constraint
          $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('open_i_d_pairwise_identifiers');
    }
};
