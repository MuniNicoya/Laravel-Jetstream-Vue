<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenidClaimsRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('openid_claims_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('oauth_clients');
            $table->string('scope');
            $table->json('claims_request_parameters')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('openid_claims_requests');
    }
}
