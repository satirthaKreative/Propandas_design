<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterLegalifoTableGoogleLinkAdd extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('legalinfo', function (Blueprint $table) {
            //
            $table->longText('google_link1')->nullable()->after('address_one');
            $table->longText('google_link2')->nullable()->after('address_two');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('legalinfo', function (Blueprint $table) {
            //
        });
    }
}
