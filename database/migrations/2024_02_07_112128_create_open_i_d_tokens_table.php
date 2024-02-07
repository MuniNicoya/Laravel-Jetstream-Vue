<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOpenIDTokensTable
 *
 * This migration creates the openid_tokens table to store ID Tokens issued by OpenID Providers.
 * ID Tokens are used for authentication and contain essential information about the user and the authentication event.
 */
class CreateOpenIDTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openid_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('iss')->comment('The URL of the expected issuer.');
            $table->string('aud')->comment('The client ID of the client.');
            $table->integer('exp')->comment('The expiration timestamp for the token.');
            $table->integer('iat')->comment('The issued at timestamp for the token.');
            $table->integer('nbf')->comment('The not before timestamp for the token.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('openid_tokens');
    }
}
