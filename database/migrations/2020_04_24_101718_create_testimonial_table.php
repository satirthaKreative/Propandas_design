<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestimonialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testimonials_tbl', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('client_img')->nullable();
            $table->longText('client_comment');
            $table->string('client_name');
            $table->longText('client_designation')->nullable();
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
        Schema::dropIfExists('testimonials_tbl');
    }
}
