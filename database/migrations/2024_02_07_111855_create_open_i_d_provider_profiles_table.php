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
        Schema::create('openid_provider_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('iss')->comment('The URL of the expected issuer.');
            $table->string('aud')->comment('The client ID of the client.');
            $table->string('sub')->comment('The identifier of the user.');
            $table->string('vot')->nullable()->comment('The vector value as specified in Vectors of Trust.');
            $table->string('vtm')->nullable()->comment('The trustmark URI as specified in Vectors of Trust.');
            $table->string('acr')->nullable()->comment('The LoA the user was authenticated at.');
            $table->string('nonce')->comment('The nonce value that was provided in the authentication request.');
            $table->string('jti')->comment('A unique identifier for the token.');
            $table->dateTime('auth_time')->nullable()->comment('The authentication time.');
            $table->integer('exp')->comment('The expiration timestamp for the token.');
            $table->integer('iat')->comment('The issued at timestamp for the token.');
            $table->integer('nbf')->comment('The not before timestamp for the token.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('openid_provider_profiles');
    }
};
