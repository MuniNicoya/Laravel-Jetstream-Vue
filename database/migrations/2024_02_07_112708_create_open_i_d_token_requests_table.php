<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOpenIDTokenRequestsTable
 *
 * This migration creates the openid_token_requests table to store requests to the OpenID Token Endpoint.
 */
class CreateOpenIDTokenRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openid_token_requests', function (Blueprint $table) {
            $table->id();
            $table->string('grant_type')->comment('Must be set to authorization_code.');
            $table->string('code')->comment('The value of the code parameter returned in the authorization response.');
            $table->string('client_assertion_type')->comment('Must be set to urn:ietf:params:oauth:client-assertion-type:jwt-bearer.');
            $table->text('client_assertion')->comment('The value of the signed client authentication JWT generated as described below.');
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
        Schema::dropIfExists('openid_token_requests');
    }
}
