<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdditionalEndUserClaimsTable extends Migration
{
    public function up()
    {

       // https://openid.net/specs/openid-connect-4-identity-assurance-1_0.html
       //https://openid.net/specs/openid-igov-use-cases-1_0.html#section-4-1
        Schema::create('additional_end_user_claims', function (Blueprint $table) {
            $table->id();
            $table->json('place_of_birth')->nullable();
            $table->json('nationalities')->nullable();
            $table->string('birth_family_name')->nullable();
            $table->string('birth_given_name')->nullable();
            $table->string('birth_middle_name')->nullable();
            $table->string('salutation')->nullable();
            $table->string('title')->nullable();
            $table->string('msisdn')->nullable();
            $table->string('also_known_as')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('additional_end_user_claims');
    }
}
