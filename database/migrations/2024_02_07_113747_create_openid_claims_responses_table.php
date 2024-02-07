<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenidClaimsResponsesTable extends Migration
{
    public function up()
    {
        Schema::create('openid_claims_responses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('claims_request_id')->constrained('openid_claims_requests');
            $table->foreignId('user_id')->constrained('users');
            $table->json('claims_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('openid_claims_responses');
    }
}
