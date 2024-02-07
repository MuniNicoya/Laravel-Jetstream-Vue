<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpenidAdditionalEndUserClaimsTable extends Migration
{
    /**
     * Run the migration.
     *
     * This method creates the table to store additional end user claims.
     * These claims are used to store additional information about the end user
     * beyond the basic identity claims provided by OpenID Connect.
     *
     * @return void
     */
    public function up()
    {
        // Creating table to store additional end user claims
        
        // Reference:
        // - https://openid.net/specs/openid-connect-4-identity-assurance-1_0.html
        // - https://openid.net/specs/openid-igov-use-cases-1_0.html#section-4-1
        
        Schema::create('openid_additional_end_user_claims', function (Blueprint $table) {
            $table->id();
            
            // JSON fields to store complex data
            $table->json('place_of_birth')->nullable(); // Place of birth
            $table->json('nationalities')->nullable(); // Nationalities
            
            // String fields for basic data
            $table->string('birth_family_name')->nullable(); // Birth family name
            $table->string('birth_given_name')->nullable(); // Birth given name
            $table->string('birth_middle_name')->nullable(); // Birth middle name
            $table->string('salutation')->nullable(); // Salutation
            $table->string('title')->nullable(); // Title
            $table->string('msisdn')->nullable(); // Mobile phone number
            $table->string('also_known_as')->nullable(); // Also known as
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration.
     *
     * This method drops the table if it exists, reverting the changes made by the 'up' method.
     *
     * @return void
     */
    public function down()
    {
        // Dropping the additional end user claims table if it exists
        Schema::dropIfExists('openid_additional_end_user_claims');
    }
}
