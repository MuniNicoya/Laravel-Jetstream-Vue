<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOpenIDDiscoveryEndpointsTable
 *
 * This migration creates the openid_discovery_endpoints table to store OpenID Connect Discovery endpoints.
 */
class CreateOpenIDDiscoveryEndpointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openid_discovery_endpoints', function (Blueprint $table) {
            $table->id();
            $table->string('issuer')->comment('The fully qualified issuer URL of the OpenID Provider.');
            $table->string('authorization_endpoint')->comment('The fully qualified URL of the OpenID Provider\'s authorization endpoint defined by RFC6749.');
            $table->string('token_endpoint')->comment('The fully qualified URL of the server\'s token endpoint defined by RFC6749.');
            $table->string('introspection_endpoint')->nullable()->comment('The fully qualified URL of the server\'s introspection endpoint defined by OAuth Token Introspection RFC7662.');
            $table->string('revocation_endpoint')->nullable()->comment('The fully qualified URL of the server\'s revocation endpoint defined by OAuth Token Revocation RFC7009.');
            $table->string('jwks_uri')->comment('The fully qualified URI of the server\'s public key in JWK Set format.');
            $table->text('scopes_supported')->comment('The list of scopes, including iGov scopes, the server supports.');
            $table->text('claims_supported')->comment('The list of claims available in the supported scopes.');
            $table->text('vot')->nullable()->comment('The vectors supported.');
            $table->text('acr_values_supported')->nullable()->comment('The acrs supported.');
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
        Schema::dropIfExists('openid_discovery_endpoints');
    }
}
