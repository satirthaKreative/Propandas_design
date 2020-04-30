<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_table', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('top_banner_title')->nullable();
            $table->string('main_banner_title')->nullable();
            $table->longText('title_description')->nullable();
            $table->longText('banner_images')->nullable();
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
        Schema::dropIfExists('banner_table');
    }
}
