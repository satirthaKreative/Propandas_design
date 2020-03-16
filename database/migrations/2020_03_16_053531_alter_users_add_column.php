<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersAddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('degree')->nullable()->after('email');
            $table->string('lname')->nullable()->after('name');
            $table->string('phn_num')->nullable()->after('degree');
            $table->longText('address1')->nullable()->after('phn_num');
            $table->longText('address2')->nullable()->after('address1');
            $table->longText('city')->nullable()->after('address2');
            $table->string('zipcode')->nullable()->after('city');
            $table->string('country')->nullable()->after('zipcode');
            $table->longText('timezone')->nullable()->after('country');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
