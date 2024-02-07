<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateOpenidEndUserClaimsTable
 */
class CreateOpenidEndUserClaimsTable extends Migration
{
    /**
     * Run the migrations.
     * https://openid.net/specs/openid-connect-core-1_0.html#StandardClaims
     *
     * @return void
     */
    public function up()
    {
        Schema::create('openid_end_user_claims', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('name')->nullable();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('nickname')->nullable();
            $table->string('preferred_username')->nullable();
            $table->string('profile')->nullable();
            $table->string('picture')->nullable();
            $table->string('website')->nullable();
            $table->string('email')->nullable();
            $table->boolean('email_verified')->nullable();
            $table->string('gender')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('zoneinfo')->nullable();
            $table->string('locale')->nullable();
            $table->string('phone_number')->nullable();
            $table->boolean('phone_number_verified')->nullable();
            $table->json('address')->nullable();
            $table->bigInteger('updated_at')->nullable();
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
        Schema::dropIfExists('openid_end_user_claims');
    }
}
