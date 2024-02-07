<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTxnAndExtendedAddressFields extends Migration
{
    public function up()
    {
        Schema::table('additional_end_user_claims', function (Blueprint $table) {
            $table->json('txn')->nullable();
            $table->string('country_code', 3)->nullable();
        });
    }

    public function down()
    {
        Schema::table('additional_end_user_claims', function (Blueprint $table) {
            $table->dropColumn('txn');
            $table->dropColumn('country_code');
        });
    }
}

