<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legalinfo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('address_one');
            $table->longText('address_two');
            $table->string('email_address');
            $table->string('phone_number');
            $table->string('legal_heading');
            $table->longText('heading_details');
            $table->longText('copyright');
            $table->longText('external_links');
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
        Schema::dropIfExists('legalinfo');
    }
}
