<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHowitworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('howItWork_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('heading_title');
            $table->longText('descriptions');
            $table->string('year_count');
            $table->string('year_text');
            $table->string('contact_no');
            $table->string('contact_text');
            $table->longText('howit_images');
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
        Schema::dropIfExists('howItWork_tbl');
    }
}
